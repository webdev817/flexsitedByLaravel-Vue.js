<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use Auth;


class TicketController extends Controller
{

    public function myRequests(Request $request)
    {
      if (superAdmin()) {
        $tickets = Ticket::paginate(10);
      }else {
        $tickets = Ticket::where('createdBy',Auth::id())->paginate(10);
      }
      $arr['tickets'] = $tickets;

      return view('supportPortal.tickets.myRequests', $arr);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $issueRelatedTo = supportFaqCategories();
        $arr['issueRelatedTo'] = $issueRelatedTo;

        return view('supportPortal.tickets.create', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'issueTopic'=> 'required|string',
          'message'=> 'required|string'
        ]);
        $ticket = [
          'ticketDepartment'=> $request->issueTopic,
          'message'=> $request->message,
          'createdBy'=> Auth::id()
        ];
        if ($request->hasFile('file')) {
          $ticket['file'] = $request->file->store('supportFiles');
        }
        $ticket = new Ticket($ticket);
        $ticket->save();

        return status('Your request has been received.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
