<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;
use StripeHelper;

use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::paginate(20);
        return view('admin.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.addEdit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
          'title'=> 'required|max:255',
          'code'=> 'required|max:255',
          'percentOff'=> 'nullable|digits_between:1,100',
        ]);


        $data['createdBy'] = Auth::id();
        if (Coupon::where('code', $request->code)->exists()) {
          return errorMessage('Coupon with this code is already exists.');
        }


        if ($request->freeLogo == "on") {
          $data['freeLogo'] = 1;
        }
        if ($request->freeFlayer == "on") {
          $data['freeFlayer'] = 1;
        }

        if ($request->freeBusinessCard == "on") {
          $data['freeBusinessCard'] = 1;
        }

        if ($request->freeOnePageWebsite == "on") {
          $data['freeOnePageWebsite'] = 1;
        }
        if ($request->percentOff != null) {
          $data['subscriptionDiscount'] = 1;

          $obj = StripeHelper::createCoupon([
            'percentOff'=> $data['percentOff'],
            'code'=> $data['code']
          ]);

          if ($obj->status == 0) {
            return errorMessage($obj->message);
          }
        }
        $coupon = new Coupon($data);
        $coupon->save();

        return statusTo('Coupon Saved', route('coupons.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.addEdit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
      $data = $request->validate([
        'title'=> 'required|max:255',
      ]);
      $coupon->title = $request->title;

      if ($request->status == 1) {
        $data['status'] = 1;
      }else {
        $data['status'] = 0;
      }

      if ($request->freeLogo == "on") {
        $data['freeLogo'] = 1;
      }else {
        $data['freeLogo'] = 0;
      }
      if ($request->freeFlayer == "on") {
        $data['freeFlayer'] = 1;
      }else {
        $data['freeFlayer'] = 0;
      }

      if ($request->freeBusinessCard == "on") {
        $data['freeBusinessCard'] = 1;
      }else {
        $data['freeBusinessCard'] = 0;
      }

      if ($request->freeOnePageWebsite == "on") {
        $data['freeOnePageWebsite'] = 1;
      }else {
        $data['freeOnePageWebsite'] = 0;
      }

      $coupon->save();
      $coupon->update($data);

      return statusTo('Coupon Updated', route('coupons.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        if (!superAdmin()) {
          return noPermission();
        }
        StripeHelper::deleteCoupon($coupon->code);
        $coupon->delete();

        return status('Coupon Deleted');
    }
    public function couponInfo(Request $request)
    {
      $request->validate([
        'couponCode'=> 'required|string|max:255'
      ]);

      $couponCode = $request->couponCode;

      $coupon = Coupon::where('code', $couponCode)->first();

      if ($coupon == null) {
        return error('Coupon not found',[]);
      }
      if ($coupon->status != 1) {
        return error('Coupon is not valid anymore',[]);
      }
      return json("Coupon Found", ['coupon'=> $coupon]);

    }
}
