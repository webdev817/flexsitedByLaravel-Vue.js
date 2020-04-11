<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = self::getOrders();

        return view('supportPortal.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    public function handleMainStore($request)
    {
      $user = Auth::user();
      $orderId = $request->orderId;
      $order = Order::where('createdBy',$user->id)->where('id',$request->orderId)->first();

      if ($order == null) {
        return status('Permission Denied');
      }
      try {
        $invoice = $user->invoiceFor('Order ' . $order->title, $order->price * 100);
        $invoiceNumber = $invoice->asStripeInvoice()->id;
      } catch (\Exception $e) {
        return errorMessage($e->getMessage());
      }


      Order::where('createdBy',$user->id)->where('id',$request->orderId)
      ->update(['invoiceNumber'=> $invoiceNumber]);

      $project = new Project([
        'orderId'=> $order->id,
        'title'=> $order->title,
        'description'=> $order->orderDetails,
        'createdBy'=> Auth::id()
      ]);
      $project->save();

      return redirect()->route('projects.show', $project->id);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->step == "main") {
        return $this->handleMainStore($request);
      }
      $orders = self::getOrders();
      if (! isset($orders[$request->type])) {
        return errorMessage("Invalid Order Number");
      }
      // dummy data of order
      $order = $orders[$request->type];

      $myOrder = new Order([
        'type'=> $request->type,
        'title'=> $order->title,
        'price'=> $order->price,
        'orderDetails'=> $request->description,
        'createdBy'=> Auth::id()
      ]);
      $myOrder->save();

      return view('supportPortal.orders.create', [
        'order'=> $myOrder,
        'dummyOrder'=> $order
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }


    public static function getOrders($orderType = null)
    {

      $orders = [
        (object)[
          'title'=> 'Logo Design',
          'price'=> 100,
          'img'=> 'mawaisnow\sp\order\logoDesign.png',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ],
        (object)[
          'title'=> 'Flyer Design',
          'price'=> 200,
          'img' => 'mawaisnow\sp\order\banner.png',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ],
        (object)[
          'title'=> 'Business Card Design',
          'price'=> 150,
          'img' => 'mawaisnow\sp\order\businessCardDesign.png',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ],
        (object)[
          'title'=> 'Banner Design',
          'price'=> 35,
          'img' => 'mawaisnow\sp\order\bannerDesign.png',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ],
        (object)[
          'title'=> 'Website Design',
          'price'=> 35,
          'img' => 'mawaisnow\sp\order\bannerDesign.png',
          'description'=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        ]
      ];
      if ($orderType == null) {
        return $orders;
      }
      if (isset($orders[$orderType])) {
        return $orders[$orderType];
      }
      return null;
    }
}
