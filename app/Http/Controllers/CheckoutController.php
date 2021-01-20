<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Mail\OrderResumeMail;
use Cartalyst\Stripe\Laravel\StripeServiceProvider;
use Stripe;
use Session;
use App\Order;
use App\OrderProduct;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    public function checkout(Request $request) 
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "eur",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);

        // Insert into Order Table

        $order = Order::create([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'addressNumber' => $request->addressNumber,
            'city' => $request->city,
            'province' => $request->province,
            'postcode' => $request->postcode,
            'phone' => $request->phone,
            'nameOnCard' => $request->nameOnCard,
            'total' => $request->total,
            'error' => $request->error,
        ]);

        // Inser into Product Order Table
        foreach(Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                //'quantity' => $item->quantity,
            ]);
        }


        $mail = $request->email;
  
        Session::flash('success', 'Payment has been successfully processed.');

        Mail::to($mail)->send(new OrderResumeMail());
          
        return view('order-completed');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
