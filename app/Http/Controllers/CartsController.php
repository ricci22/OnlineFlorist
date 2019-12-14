<?php

namespace App\Http\Controllers;

use App\TransactionDetails;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Courier;
use App\Transaction;
use App\Cart;
use App\CartDetail;
use App\Flower;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $cartDetails = CartDetail::All();
      $cartsTotal = $cartDetails->sum('total');
      $flowers = Flower::All();
      $couriers= Courier::All();
      return view('carts.index')
        ->with(compact('cartDetails', 'flowers', 'cartsTotal', 'couriers'));
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
      if (Auth::check()){
        if (is_null($request->input('courier'))) {
          return redirect('/carts')->with('error', 'You need to select the Courier');
        }
        else {
          $transaction = new Transaction();
          $transaction->user_id = Auth::id();
          $transaction->courier_id = $request->input('courier');

          // getting the courier name
          $courierName = Courier::find($transaction->courier_id)->name;
          $transaction->cname = $courierName;

          // getting the user name
          $userName = User::find($transaction->user_id)->name;
          $transaction->uname = $userName;

          // calculate the grand total to store
          $cartDetails = CartDetail::All();
          $cartTotal = $cartDetails->sum('total');
          $courierPrice = Courier::find($transaction->courier_id)->shippingCost;
          $transaction->total = $cartTotal + $courierPrice;

          // save data into transactions table
          $transaction->save();

          // process each row of cartDetails table
          foreach ($cartDetails as $cartDetail) {
            // insert data into transaction_details table
            $transactionDetails = new TransactionDetails();
            $transactionDetails->transaction_id = $transaction->id;
            $transactionDetails->flower_id = $cartDetail->flower_id;
            $transactionDetails->qty = $cartDetail->qty;
            $transactionDetails->total = $cartDetail->total;
            $transactionDetails->fname = Flower::find($transactionDetails->flower_id)->name;
            $transactionDetails->fimage = Flower::find($transactionDetails->flower_id)->cover_image;
            $transactionDetails->save();

            // Update the qty on flowers table
            $flower = Flower::find($transactionDetails->flower_id);
            $flower->stock -= $transactionDetails->qty;
            $flower->save();

            // Delete the CartDetail data
            $cartDetail->delete();
          }

          return redirect('order')->with('success', 'Your Order has been processed, Thank You for Shopping!');
        }
      }
      else {
        return view('auth.login')->with('message', 'You need to be logged in first');
      }
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
      $flowerStock = Flower::find($id)->stock;
      $data = CartDetail::where('flower_id', $id)->first();
      if(is_null($data)) {
        $cartDetail = new CartDetail();
        $cartDetail->qty = 1;
        // validate the qty Ordered must not exceed the flower Stock
        if ($cartDetail->qty > $flowerStock) {
          return redirect('/')->with('error', 'Your order exceed the flower stock limit, Check your Cart');
        }
        $cartDetail->flower_id = $id;
        $cartDetail->total = Flower::find($id)->price;
        $cartDetail->save();
      }
      else {
        $cartDetail = CartDetail::where('flower_id', $id)->first();
        $cartDetail->qty += 1;
        // validate the qty Ordered must not exceed the flower Stock
        if ($cartDetail->qty > $flowerStock) {
          return redirect('/')->with('error', 'Your order exceed the flower stock limit, Check your Cart');
        }
        $cartDetail->total = Flower::find($id)->price * $cartDetail->qty;
        $cartDetail->save();
      }
      return redirect('/')->with('success', 'Adding your Order to your Cart');
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
      $flowerStock = Flower::find($id)->stock;
      $qty = $request->input('qty');
      $data = CartDetail::where('flower_id', $id)->first();
      if(is_null($data)) {
        $cartDetail = new CartDetail();
        $cartDetail->qty = $qty;
        // validate the qty Ordered must not exceed the flower Stock
        if ($cartDetail->qty > $flowerStock) {
          return redirect('/flowers/'.$id)->with('error', 'Your order exceed the flower stock limit, Check your Cart');
        }
        $cartDetail->flower_id = $id;
        $cartDetail->total = Flower::find($id)->price * $cartDetail->qty;
        $cartDetail->save();
      }
      else {
        $cartDetail = CartDetail::where('flower_id', $id)->first();
        $cartDetail->qty += $qty;
        // validate the qty Ordered must not exceed the flower Stock
        if ($cartDetail->qty > $flowerStock) {
          return redirect('/flowers/'.$id)->with('error', 'Your order exceed the flower stock limit, Check your Cart');
        }
        $cartDetail->total = Flower::find($id)->price * $cartDetail->qty;
        $cartDetail->save();
      }
      return redirect('/flowers/'.$id)->with('success', 'Adding your Order to your Cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cartDetail = CartDetail::find($id);
      $cartDetail->delete();
      return redirect('carts/')->with('success', 'Item Removed');
    }
}