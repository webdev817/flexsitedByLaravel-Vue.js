<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SupportFAQ;
use App\SupportChatSession;
use App\SupportChat;
use App\User;
use Auth;

class SupportController extends Controller
{
    public function index(Request $request)
    {
      $arr['faqs'] = SupportFAQ::where('status',1)->get();
      return view('supportPortal.support.index', $arr);
    }
    public function faqs(Request $request)
    {
      $arr['faqs'] = SupportFAQ::where('status',1)->get();
      return view('supportPortal.support.faq', $arr);
    }
    public function supportChat(Request $request)
    {
      $supportChatSession = SupportChatSession::query();


      if (superAdmin()) {
        if ($request->id == null) {
          return redirect()->route('supportChatsRequests');
        }
        $supportChatSession = $supportChatSession->where('id',$request->id);
      }else {
        $supportChatSession = $supportChatSession->where('createdBy',Auth::id());
      }
      $supportChatSession = $supportChatSession->orderBy('id','desc')->first();

      if ($supportChatSession == null || $supportChatSession->status == 2) {
        $supportChatSession = new SupportChatSession([
          'status'=> 1,
          'createdBy'=> Auth::id()
        ]);
        $supportChatSession->save();

        newNoti(1, "New support Chat", "New Support Chat Request",
        route('supportChat',['id'=> $supportChatSession->id]), 0);


        $arr['new'] = true;
      }

      $arr['supportChatSession'] = $supportChatSession;

      return view('supportPortal.support.chat', $arr);
    }

    public function supportChatSessionClose(Request $request,$id)
    {
      $supportChatSession = SupportChatSession::find($id);

      if ($supportChatSession->createdBy != Auth::id() && !superAdmin()) {
        return noPermission();
      }
      $supportChatSession->update([
        'status'=> 2
      ]);
      return redirect()->route('supportSp')->with('status','Thanks for reaching out');
    }

    public function supportChatApi(Request $request)
    {

      $sessionId = $request->sessionId;
      $supportChatSession = SupportChatSession::find($sessionId);
      if ($supportChatSession == null) {
        return error('This session does not exists');
      }
      if (!superAdmin() && $supportChatSession->createdBy != Auth::id()) {
        return error("Not Authorized");
      }

      if ($request->lastId == null) {
         $supportChat = SupportChat::where('SupportChatSessionId', $sessionId);
         $supportChat =  $supportChat->orderBy('id','asc')->get();
        $status = 0;
      }else {
        $status = 1;
         $supportChat = SupportChat::where('SupportChatSessionId', $sessionId);
         $supportChat =  $supportChat->where('createdBy', '!=',Auth::id());
         $supportChat =  $supportChat->where('id','>', $request->lastId);

         $supportChat =  $supportChat->orderBy('id','asc')->get();
      }
      $unreadSupportChats = SupportChat::join('users', 'users.id', '=', 'support_chats.createdBy')
            ->select('support_chats.*')
            ->where('users.role', '<>', 9)
            ->whereNull('received_at')
            ->get();

      foreach ($unreadSupportChats as $supportChat) 
      {
          $message = "[FLEXSITED]: New OnBoarding Chat Arrived!!!   Please communicate with your end user!";
          $sms = [
            'phone' => '678-741-1928',
            'message'=> $message,
          ];
          sendSMS($sms);      
          $supportChat->received_at = date('Y-m-d H:i:s');
          // echo($supportChat->received_at);
          $supportChat->save();
      }
      return json('success',[
        'supportChat'=> $supportChat,
        'status'=> $status
      ]);

    }


    public function getSupportChatList(Request $request)
    {
      $sessionId = $request->sessionId;

      $supportChatSession = SupportChatSession::find($sessionId);
      if ($supportChatSession == null) {
        return error('This session does not exists');
      }
      if (!superAdmin() && $supportChatSession->createdBy != Auth::id()) {
        return error("Not Authorized");
      }


      $supportChat = SupportChat::where('SupportChatSessionId', $sessionId);

      $supportChat = $supportChat->orderBy('id','asc')->get();
      return $supportChat;
    }

    public function storeSupportChat(Request $request)
    {
      $message = $request->message;
      $sessionId = $request->sessionId;

      if ($message == null || $message == "") {
        return error('Message is empty');
      }
      $supportChatSession = SupportChatSession::find($sessionId);
      if ($supportChatSession == null) {
        return error('project does not exists');
      }
      if (!superAdmin() && $supportChatSession->createdBy != Auth::id()) {
        return error("Not Authorized");
      }
      $chatArray = [
        'message'=> $message,
        "SupportChatSessionId"=> $sessionId,
        'createdBy'=> Auth::id(),
        'isAttachment'=> 0,
      ];

      if ($request->hasFile('file')) {
        $isArray = getimagesize($request->file->getPathName());
        if (!is_array($isArray)) {
          return error('Please choose a valid image');
        }
        $chatArray['isAttachment'] = 1;
        $chatArray['path'] = $request->file->store('attachments');
        $chatArray['fileName'] = $request->fileName;
      }

      $supportChat = new SupportChat($chatArray);

      $supportChat->save();
     
      $newChat = SupportChat:: where('SupportChatSessionId', $sessionId)->get();
      if(count($newChat) == 1){
          $admin_id = User::where("role", 9)->first()->id;

          $chatArray = [
          'message'=> "Thank you for contacting us.  A customer support representative will be with you momentarily.",
          "SupportChatSessionId"=> $sessionId,
          'createdBy'=> $admin_id,
          'isAttachment'=> 0,
        ];
        $supportChat = new SupportChat($chatArray);
        
        $supportChat->save();
      }
      return json('saved successfully', $supportChat);

    }




    public function supportChatsRequests(Request $request)
    {
      $arr['supportChatSessions'] = SupportChatSession::join('users', 'users.id', '=', 'support_chat_sessions.createdBy')
      ->addSelect('support_chat_sessions.*')->paginate(20);

      return view('admin.support.myRequests', $arr);
    }
}
