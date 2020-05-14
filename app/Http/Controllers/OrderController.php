<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;
use App\Order;
use App\SupportOrder;
use StripeHelper;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Auth;

class OrderController extends Controller
{
    public function orderEdit($id)
    {
      $order  = SupportOrder::findOrFail($id);
      return view('admin.orders.addEdit',compact('order'));
    }
    public function orderEditStore(Request $request, $orderId)
    {
      $order  = SupportOrder::findOrFail($orderId);
      if ($order->id != 4 && !is_numeric($request->price)) {
        return errorMessage('You need to enter a numeric price');
      }
      $request->validate([
        'title'=> 'string|min:3|max:255'
      ]);
      $order->price = $request->price;
      $order->description = $request->description;

      $order->title = $request->title;
      if ($request->hasFile('file')) {
        $order->img = "storage/" . $request->file->store('orderImages');
      }
      $order->save();

      return statusTo('Order updated', route('ordersList'));

    }
    public function ordersList()
    {
      $orders = SupportOrder::all();
      return view('admin.orders.index',compact('orders'));
    }
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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return redirect()->route('orderConfirmation', $myOrder->id);
    }

    public function orderConfirmation(Request $request, Order $order)
    {
        $user = Auth::user();
        if ($order->createdBy != $user->id) {
            return errorMessage('This order does not belongs to you.');
        }

        if ($request->ps == 1 || $order->billingStatus == 2) {
            return $this->authCompleted($order, $user);
        }

        $orders = self::getOrders();
        // dummy data of order
        $dummyOrder = $orders[$order->type];
        if ($order->billingStatus == 0) {
            return view('supportPortal.orders.create', [
              'order'=> $order,
              'dummyOrder'=> $dummyOrder,
              'intent'=>  $user->createSetupIntent()
            ])->withErrors([$order->billingError]);
        } else {
            return view('supportPortal.orders.create', [
              'order'=> $order,
              'dummyOrder'=> $dummyOrder,
              'paymentIntent'=>  $user->createSetupIntent()
            ]);
        }
    }
    public function orderConfirmationStore(Request $request, Order $order)
    {
        $user = Auth::user();
        if ($user->id != $order->createdBy) {
            return errorMessage('This order does not belongs to you.');
        }
        if ($request->paymentMethod != null) {
            $paymentMethod = $request->paymentMethod;
            $obj = StripeHelper::updateCard($paymentMethod);

            if ($obj->status == 0) {
                return errorMessage($obj->message);
            }
        }


        // website subscription not a normal order
        if ($order->type == 4) {
            return $this->handleWebsiteOrder($order);
        }

        try {
            $invoice = $user->invoiceFor($order->title .' Order' , $order->price * 100, [
          'metadata'=>['orderId'=> $order->id]
        ]);
            $invoiceNumber = $invoice->asStripeInvoice()->id;
        } catch (IncompletePayment $exception) {
            $response = redirect()->route(
                'cashier.payment',
                [$exception->payment->id, 'redirect' => route('orderConfirmation', [$order->id,'ps' => 1])]
            );
            return $response;
        } catch (\Exception $e) {
            $order->billingStatus = 0;
            $order->billingError = $e->getMessage();
            $order->save();

            return redirect()->back();
        }

        $order->update(['invoiceNumber'=> $invoiceNumber]);

        $project = new Project([
        'orderId'=> $order->id,
        'title'=> $order->title,
        'description'=> $order->orderDetails,
        'createdBy'=> Auth::id()
      ]);
        $project->save();

        return redirect()->route('projects.index')->with('OrderPlaced', 'Order has been placed');
    }

    public function authCompleted($order, $user)
    {
        if (Project::where('orderId',$order->id)->exists()) {
          return redirect()->route('projects.index')->with('OrderPlaced', 'Order has been placed');
        }
        $project = new Project([
        'orderId'=> $order->id,
        'title'=> $order->title,
        'description'=> $order->orderDetails,
        'createdBy'=> $user->id
      ]);
        $project->save();

        return redirect()->route('projects.index')->with('OrderPlaced', 'Order has been placed');
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


    public function handleWebsiteOrder($order)
    {
        $user = Auth::user();
        $request = request();



        $planNumber = $request->planSelected;
        $planDurration = $request->planDurration;
        if ($planDurration == 2) {
            $planDurration = "y";
        }
        $planId = "basicPlanMonthly"; //by default basic plan


        if ($planDurration == "y") {
            // choose Yearly plan
            if ($planNumber == 1) {
                $planId = "basicPlanYearly";
            } elseif ($planNumber == 2) {
                $planId = "essentialPlanYearly";
            } elseif ($planNumber == 3) {
                $planId = "activePlanYearly";
            } elseif ($planNumber == 4) {
                $planId = "completePlanYearly";
            }
        } else {
            // monthlyPlans
            if ($planNumber == 1) {
                $planId = "basicPlanMonthly";
            } elseif ($planNumber == 2) {
                $planId = "essentialPlanMonthly";
            } elseif ($planNumber == 3) {
                $planId = "activePlanMonthly";
            } elseif ($planNumber == 4) {
                $planId = "completePlanMonthly";
            }
        }

        $price = 0;
        $allPlans = flexsitedPlans();
        $planSelected = $allPlans[$request->planSelected - 1];
        if ($request->planDurration == 2) {
            $price = $planSelected->priceYearly;
        } else {
            $price = $planSelected->price;
        }

        $order->update(['price'=>$price]);
        // subscribe to plan
        try {
            $obj = StripeHelper::subscribeToPlan($user, $planId, null, $order->id);


            // unhandle able error
            if ($obj->status == 0) {
                $order->billingStatus = 0;
                $order->billingError = $obj->message;
                $order->save();
                return redirect()->back();
            }

            // incomplete
            if ($obj->status == 3) {
                $response = redirect()->route(
                    'cashier.payment',
                    [$obj->exception->payment->id, 'redirect' => route('orderConfirmation', [$order->id,'ps' => 1])]
                );
                return $response;
            }
        } catch (\Exception $e) {
            return errorMessage($e->getMessage());
        }

        $invoiceNumber = 0;

        $order->update(['invoiceNumber'=> $invoiceNumber]);

        $order->billingStatus = 1;
        $order->billingError = null;
        $order->save();

        $project = new Project([
          'orderId'=> $order->id,
          'title'=> $order->title,
          'description'=> $order->orderDetails,
          'createdBy'=> Auth::id()
        ]);
        $project->save();

        return redirect()->route('projects.index')->with('OrderPlaced', 'Order has been placed');
    }



    public static function getOrders($orderType = null)
    {
        return getSupportOrders($orderType);
    }
}
