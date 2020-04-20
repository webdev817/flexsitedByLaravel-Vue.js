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

      return redirect()->route('projects.index')->with('OrderPlaced','Order has been placed');
      // return redirect()->route('projects.show', $project->id);

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
      $price = $order->price;
      if ($request->type == 4) {
        $price = 0;
      }
      $myOrder = new Order([
        'type'=> $request->type,
        'title'=> $order->title,
        'price'=> $price,
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
          'price'=> 150,
          'img'=> 'mawaisnow\sp\order\logoOrder.png',
          'description'=> 'We will design a professional logo for your business. You will receive two design concepts for your review and feedback.Once you have decided on the design that you would like to go with. The revisions process starts. You will have three revision opportunities. Below please add the details for your design project.'
        ],
        (object)[
          'title'=> 'Flyer Design',
          'price'=> 200,
          'img' => 'mawaisnow\sp\order\6.jpg',
          'description'=> 'We will design a professional one-page flyer for your business.  You will receive one design concept based on provided instructions.  You will have three revision opportunities.  Below please add the details for your design project.'
        ],
        (object)[
          'title'=> 'Business Card Design',
          'price'=> 150,
          'img' => 'mawaisnow\sp\order\Amazing Lash Loft-1.jpg',
          'description'=> 'We will design a set of professional business cards for your business. This includes both front and back.  You will receive two design concepts for your review and feedback.  You will have three revision opportunities.   In the box below, add the details for your design project.'
        ],
        (object)[
          'title'=> 'Social Media Design',
          'price'=> 150,
          'img' => 'mawaisnow/sp/order/socialmediaexample.jpg',
          'description'=> 'We will design your social media banner and profile for any channel or two social media design posts for either Facebook or Instagram for your business.  You will receive one design concept based on your instructions. You will have three revision opportunities. In the box below, add the details for your design project.'
        ],
        (object)[
          'title'=> 'Website Design',
          'price'=> "39-129 a month",
          'img' => 'mawaisnow\sp\order\Screen Shot 2020-04-20 at 11.29.10 AM.png',
          'description'=> 'We will create a new website for your business. You have the option of choosing from one of our monthly plans. '
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
