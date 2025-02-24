<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class FrDonateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("FrontEnd.donate");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'txtphone' => 'required',
            'country' => 'required',
            'amount' => 'required',
        ]);

        $donationdata = new Donation;
        $donationdata->name = $request->name;
        $donationdata->email = $request->email;
        $donationdata->txtphone = $request->txtphone;
        $donationdata->address = $request->address;
        $donationdata->country = $request->country;
        $donationdata->donationtype = $request->donationtype;
        $donationdata->dob = $request->dob;
        $donationdata->txtpan = $request->txtpan;
        $donationdata->amount = $request->amount;
        $donationdata->ip_address = $request->ip();
        $donationdata->browser = $request->header('User-Agent');


            $data = array (
                'merchantId' => 'M22H7FZOA0Q3S',
                'merchantTransactionId' => uniqid(),
                'merchantUserId' => 'MUID123',
                'amount' =>  100 * ($request->amount),
                'redirectUrl' => route('Donation_response'),
                'redirectMode' => 'POST',
                'callbackUrl' => route('Donation_response'),
                'mobileNumber' =>  $request->txtphone,
                'paymentInstrument' =>
                array (
                  'type' => 'PAY_PAGE',
                ),
              );

              $encode = base64_encode(json_encode($data));

              $saltKey = 'eb858e88-bbb9-4b9c-9f5f-96fa72123a8b';
              $saltIndex = 1;

              $string = $encode.'/pg/v1/pay'.$saltKey;
              $sha256 = hash('sha256',$string);
              // dd($sha256);
              $finalXHeader = $sha256.'###'.$saltIndex;

              $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
          ->withHeader('Content-Type:application/json')
          ->withHeader('X-VERIFY:'.$finalXHeader)
          ->withData(json_encode(['request' => $encode]))
          ->post();

          $rData = json_decode($response);
          $donationdata->order_id = $rData->data->merchantTransactionId;
          if($rData->success == true){
              $donationdata->save();
            //   dd($rData);
              return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
          }
         else {
            return redirect(route('FrontEnd_Donate'))->with("error", "something Error ! <br> please try again.");
        }
    }

    public function getway($amount,$textphone,$id){
        // dd($amount.'--'.$textphone);
        $data = array (
            'merchantId' => 'M22H7FZOA0Q3S',
            'merchantTransactionId' => uniqid().'_'.$id,
            'merchantUserId' => 'MUID123',
            'amount' =>  100 * ($amount),
            'redirectUrl' => route('responsegetway'),
            'redirectMode' => 'POST',
            'callbackUrl' => route('responsegetway'),
            'mobileNumber' =>  $textphone,
            'paymentInstrument' =>
            array (
              'type' => 'PAY_PAGE',
            ),
          );

          $encode = base64_encode(json_encode($data));

          $saltKey = 'eb858e88-bbb9-4b9c-9f5f-96fa72123a8b';
          $saltIndex = 1;

          $string = $encode.'/pg/v1/pay'.$saltKey;
          $sha256 = hash('sha256',$string);
          // dd($sha256);
          $finalXHeader = $sha256.'###'.$saltIndex;

          $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
      ->withHeader('Content-Type:application/json')
      ->withHeader('X-VERIFY:'.$finalXHeader)
      ->withData(json_encode(['request' => $encode]))
      ->post();

      $rData = json_decode($response);
      return $rData;
    
    }

    public function response(Request $request)
    {
        $input = $request->all();

        

        $saltKey = 'eb858e88-bbb9-4b9c-9f5f-96fa72123a8b';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;
        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();
    // dd($input);
                $paymentData = json_decode($response);
                // dd($paymentData);
                $donerData = Donation::where('order_id', $input['transactionId'])->orderBy('created_at', 'DESC')->first();
                if(is_null($donerData)){
                    // dd($input['code']);
                    return redirect(route("donate_details"))->with("error", "payment not done !");
                }else{

                    $donerData->status = true;
                    $donerData->save();

                    $donerData = Donation::where('order_id', $input['transactionId'])->orderBy('created_at', 'DESC')->first();
                    // dd($donerData);
// dd($input['transactionId']);
                return view('FrontEnd.payment-success', ['paymentData' => $paymentData, 'donerData' => $donerData]);
                }
    }


    // public function refundProcess($tra_id)
    // {
    //     $payload = [
    //        'merchantId' => 'MERCHANTUAT',
    //        'merchantUserId' => 'MUID123',
    //        'merchantTransactionId' => ($tra_id),
    //        'originalTransactionId' => strrev($tra_id),
    //        'amount' => 5000,
    //        'callbackUrl' => route('response'),
    //     ];

    //     $encode = base64_encode(json_encode($payload));

    //     $saltKey = '099eb0cd-02cf-4e2a-8aca-3e6c6aff0399';
    //     $saltIndex = 1;

    //     $string = $encode.'/pg/v1/refund'.$saltKey;
    //     $sha256 = hash('sha256',$string);

    //     $finalXHeader = $sha256.'###'.$saltIndex;

    //     $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/refund')
    //             ->withHeader('Content-Type:application/json')
    //             ->withHeader('X-VERIFY:'.$finalXHeader)
    //             ->withData(json_encode(['request' => $encode]))
    //             ->post();

    //     $rData = json_decode($response);



    //     $finalXHeader1 = hash('sha256','/pg/v1/status/'.'MERCHANTUAT'.'/'.$tra_id.$saltKey).'###'.$saltIndex;

    //     $responsestatus = Curl::to('https://api-preprod.phonepe.com/apis/merchant-simulator/pg/v1/status/'.'MERCHANTUAT'.'/'.$tra_id)
    //             ->withHeader('Content-Type:application/json')
    //             ->withHeader('accept:application/json')
    //             ->withHeader('X-VERIFY:'.$finalXHeader1)
    //             ->withHeader('X-MERCHANT-ID:'.$tra_id)
    //             ->get();

    //     dd(json_decode($response),json_decode($responsestatus));
    //     // dd($rData);
    // }


    public function donate_details()
    {
        return view("FrontEnd.donate-bankdetails");
    }

}
