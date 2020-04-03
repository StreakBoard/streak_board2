<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use App\transactionlog;
use DB;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('pages.payment');

    }

    public function paymentprocess($id){

         return view('pages.payment');

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
        try {
            $charge = Stripe::charges()->create([
                'amount' => $request->prices,
                'currency' => "USD",
                'source' => $request->stripeToken,
                'description' => 'Order',
                'receipt_email' => "uzairidrees168@gmail.com",
                'metadata' => [
                	'quantity' => 3,
                ],
            ]);

        } catch (Exception $e) {


        }
        // $transactionlogs = new transactionlog();
        // $transactionlogs->Subscription=$request->packagesTitle;
        // $transactionlogs->billingperiod="One Month";
        // $transactionlogs->cardinfo=\Auth::user()->id;
        // $transactionlogs->save();

          $package_name = $request->packagesTitle;


        DB::table('transactionlogs')
        ->where('cardinfo', \Auth::user()->id)
        ->update([
         'Subscription' => $package_name,
         'billingperiod'=> 'One Month' ]);
        return redirect('/team_dashboard');
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

    public function freePackage(){

      $package_name = "STARTER";
      DB::table('transactionlogs')
      ->where('cardinfo', \Auth::user()->id)
      ->update([
       'Subscription' => $package_name,
       'billingperiod'=> 'One Month' ]);
      return redirect('/team_dashboard');

    }
}
