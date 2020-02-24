<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DesignCategory;
use App\Wizered;
use App\Design;
use Auth;


class WizeredController extends Controller
{

    public function domainSelected(Request $request)
    {
      $request->validate([
        'domain'=>'required|string|max:250'
      ]);

      self::insertWizered("domain",$request->domain);
      self::insertWizered("currentStep",2);


      return redirect()->route('select-design');

    }
    public function selectDesign(Request $request)
    {
      $currentStep = 2;

      $categoryId = (int)$request->c;

      $designs = Design::with('category');
      if ($categoryId != null) {
        $designs = $designs->where('categoryId',$categoryId);
      }

      $designs = $designs->paginate(12);

      $designCategory = DesignCategory::where('status',1)->get();

      return view('welcomeWizered.main',compact('currentStep','designs','designCategory'));
    }
    public function websitePackege(Request $request)
    {
      $currentStep = 3;
      return view('welcomeWizered.main',compact('currentStep'));
    }
    public function selectedDesign(Request $request, $designId)
    {
      $designId = (int)$designId;
      if ($designId == null || !is_int($designId)) {
        return errorMessage('Please choose a design');
      }
      if (Design::where('id',$designId)->count() == 0) {
        return errorMessage('Selected design does not exists');
      }

      self::insertWizered("selectedDesign", $designId);
      self::insertWizered("currentStep",3);

      return redirect()->route('websitePackege');

    }



    public function selectedWebsitePackege(Request $request, $packegeNumber)
    {
      $packegeNumber = (int)$packegeNumber;

      self::insertWizered("selectedWebsitePackege", $packegeNumber);
      self::insertWizered("currentStep",4);

      return redirect()->route('planAndBilling', $packegeNumber);
    }
    public function planAndBilling(Request $request, $planNumber)
    {

      $currentStep = 4;

      return view('welcomeWizered.main',compact('currentStep','planNumber'));
    }








    public static function insertWizered($key, $value){
      Wizered::where('userId',Auth::id())->where('key',$key)->delete();

      $wizered = new Wizered;
      $wizered->userId = Auth::id();
      $wizered->key = $key;
      $wizered->value = $value;
      $wizered->save();
    }



}
