<?php

namespace App\Http\Controllers;

use App\Models\Ngoonlinetestregistration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ixudra\Curl\Facades\Curl;
use App\Http\Controllers\user\FrDonateController;
use App\Models\Regpayment;
use App\Models\Classname;


class NgoonlinetestregistrationController extends Controller
{
    private $getway;
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->getway=app(FrDonateController::class);
        
    }
    public function index()
    {
        $classList=Classname::get()->toArray();
        // dd($classList);
        return view('FrontEnd.Scholarship.scholarship',compact('classList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $results = DB::table('ngoonlinetestregistrations')
    ->join('regpayments', 'ngoonlinetestregistrations.user_id', '=', 'regpayments.user_id')
    ->select(
        'ngoonlinetestregistrations.registrationid',
        'ngoonlinetestregistrations.name',
        'ngoonlinetestregistrations.fname',
        'ngoonlinetestregistrations.mname',
        'ngoonlinetestregistrations.email',
        'ngoonlinetestregistrations.mobile',
        'regpayments.transaction_id',
        'regpayments.amount',
        'regpayments.reference_Id'
    )
    ->get();

return $results;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ngoonlinetestregistration $ngoonlinetestregistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ngoonlinetestregistration $ngoonlinetestregistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ngoonlinetestregistration $ngoonlinetestregistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ngoonlinetestregistration $ngoonlinetestregistration)
    {
        //
    }

    public function uploadScreenshotAfterPop(Request $request)
    {
        $request->validate([
            'registration_id' => 'required',
            'screenshotafterpop' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $registrationId = $request->input('registration_id');

        $record = DB::table('ngoonlinetestregistrations')
            ->where('registrationid', $registrationId)
            ->first();

        if ($record && $record->screenshot) {
            Storage::delete('screenshot/' . $record->screenshot);
        }

        $file = $request->file('screenshotafterpop');
        $newName = 'screenshot' . rand(10000, 99999) . '.jpg';
        $file->storeAs('screenshot', $newName);

        DB::table('ngoonlinetestregistrations')
            ->where('registrationid', $registrationId)
            ->update(['screenshot' => $newName]);

        return response()->json(['status' => 1]);
    }

    public function uploadScreenshotPop(Request $request)
    {
        $request->validate([
            'registrationid' => 'required',
            'screenshotpop' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $registrationId = $request->input('registrationid');

        $record = DB::table('ngoonlinetestregistrations')
            ->where('registrationid', $registrationId)
            ->first();

        if ($record && $record->screenshot) {
            Storage::delete('screenshot/' . $record->screenshot);
        }

        $file = $request->file('screenshotpop');
        $newName = 'screenshot' . rand(10000, 99999) . '.jpg';
        $file->storeAs('screenshot', $newName);

        DB::table('ngoonlinetestregistrations')
            ->where('registrationid', $registrationId)
            ->update(['screenshot' => $newName]);

        return response()->json([
            'status' => 1,
            'message' => 'Registration successful.',
            'registration_id' => $registrationId,
        ]);
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|digits:10',
        ]);

        $phone = $request->input('phone');

        $exists = DB::table('ngoonlinetestregistrations')
            ->where('mobile', $phone)
            ->exists();

        if ($exists) {
            return response('0');
        }

        $otp = rand(100000, 999999);

        Cookie::queue('otp', $otp, 10);
        Cookie::queue('mobile', $phone, 10);

        $apiKey = '35E2110A46C1C0';
        $msg = "Dear Candidate, Your one-time verification code for the Online PRE/POST scholarship Test is $otp.";

        $apiUrl = "https://sms.textmysms.com/app/smsapi/index.php?key=$apiKey&campaign=0&routeid=13&type=text&contacts=$phone&senderid=PRAGTI&msg=" . urlencode($msg);

        file_get_contents($apiUrl);

        return response($otp);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $otp = $request->input('otp');

        if ($otp == Cookie::get('otp')) {
            return response('1');
        }

        return response('0');
    }

    public function register(Request $request)
    {
    //    dd($request->all());
        // dd($name);
        
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'nullable',
            'email' => 'required|email',
            'mobile' => 'required|digits:10',
            'aadhar' => 'required|digits:12',
            'dob' => 'required|date',
            'category' => 'required',
            'classVal' => 'required',
            'bank' => 'required',
            'accountholder' => 'required',
            'accountno' => 'required',
            'ifsc' => 'required',
        ]);
        // dd($request->all());
        // $name = $request->input('name');
        // $fname = $request->input('fname');
        // $mname = $request->input('mname');
        // $dob = $request->input('dob');
        // $email = $request->input('email');
        $mobile = $request->input('mobile');
        // $aadhar = $request->input('aadhar');
        // $category = $request->input('category');
        // $class = $request->input('class');
        // $bank = $request->input('bank');
        // $accountholder = $request->input('accountholder');
        // $accountno = $request->input('accountno');
        // $ifsc = $request->input('ifsc');
        // dd($request->all());
        $data = $request->only([
            'name', 'fname', 'mname', 'email', 'mobile1', 'aadhar', 'dob', 'category', 'class', 'bank', 'accountholder', 'accountno', 'ifsc'
        ]);
        $userData = $request->only(['name', 'email', 'mobile1']); // Get the specified keys
        $userData['full_name'] = $userData['name'];  // Rename 'name' to 'full_name'
        $userData['phone'] = $userData['mobile1'];   // Rename 'mobile' to 'phone'
        $data['mobile'] = $data['mobile1'];   // Rename 'mobile' to 'phone'
        unset($data['classVal'],$data['mobile1']);
        // Remove the original keys if needed
        unset($userData['name'], $userData['mobile1']);
        $userData['password']=Hash::make($mobile);
        $userData['role']='student';
        $data['dob'] = date('Y-m-d', strtotime($request->input('dob')));
        $data['status'] = 0;
        $data['registrationid'] = 'PWST' . sprintf('%06d', (100000 + DB::table('ngoonlinetestregistrations')->count()));
        $session=session([
            'registration_data' => $data,   // Store all registration data
            'user_data' => $userData       // Store all user data
        ]);
        $amount=135;
        $rData=$this->getway->getway($amount,$userData['phone']);
        // dd($userData);
        $insertDatainUser=DB::table('tbl_user')->insertGetId($userData);
        $data['user_id']=$insertDatainUser;
        $data['exam_status']=0;
        $insertData=DB::table('ngoonlinetestregistrations')->insert($data);
        
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
        // dd($session);
        // dd(session()->all());
        //

        // if ($session) {
            // return response()->json([
            //     'status' => 1,
            //     'message' => 'Registration successful.',
            //     // 'registration_id' => $data['registrationid'],
            //     // 'name' => $data['name'],
            // ]);
        // }

        // return response()->json(['error' => 'Database insertion failed.'], 500);
    }

    public function response(Request $request){
        // $input = $request->all();
        $input= [
        "code" => "PAYMENT_SUCCESS",
        "merchantId" => "M22H7FZOA0Q3S",
        "transactionId" => "6796500c5180f",
        "amount" => "100",
        "providerReferenceId" => "T2501262039177068925572",
        "merchantOrderId" => "6796500c5180f",
        "param1" => "na",
        "param2" => "na",
        "param3" => "na",
        "param4" => "na",
        "param5" => "na",
        "param6" => "na",
        "param7" => "na",
        "param8" => "na",
        "param9" => "na",
        "param10" => "na",
        "param11" => "na",
        "param12" => "na",
        "param13" => "na",
        "param14" => "na",
        "param15" => "na",
        "param16" => "na",
        "param17" => "na",
        "param18" => "na",
        "param19" => "na",
        "param20" => "na",
        "checksum" => "66c364a070efe88ca7f1fe2ca9c78aa738747c2dca47f1ab246b75b39d2c39c1###1",
        ];
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
                $regpaymentDetails=new Regpayment;
                $regpaymentDetails->transaction_id = $input['transactionId'];
                $regpaymentDetails->amount = $input['amount'];
                // $regpaymentDetails->registrationid = $input[''];
                // dd(session()->all());
                $transactionDetails=$request->only(['transactionId','amount']);
                $donerData = Regpayment::where('order_id', $input['transactionId'])->orderBy('created_at', 'DESC')->first();
                if(is_null($donerData)){
                    // dd($input['code']);
                    return redirect(route("donate_details"))->with("error", "payment not done !");
                }else{

                    $donerData->status = true;
                    $donerData->save();

                    $donerData = Regpayment::where('order_id', $input['transactionId'])->orderBy('created_at', 'DESC')->first();
                    // dd($donerData);
// dd($input['transactionId']);
                return view('FrontEnd.payment-success', ['paymentData' => $paymentData, 'transactionDetails' => $transactionDetails]);
                }
    }
    
       public function registrationlist(Request $request) {
                $data = Ngoonlinetestregistration::join('classnames', 'classnames.id', '=', 'ngoonlinetestregistrations.class')
                    ->select(['classnames.class_name', 'ngoonlinetestregistrations.*'])
                    ->get();
            
                return view('BackEnd.list_registion', compact('data'));
            }
            
            public function updateStatus(Request $request) {
                // $validated = $request->validate([
                //     'registration_id' => 'required|exists:ngoonlinetestregistrations,registrationid',
                //     'status' => 'required|boolean',
                // ]);
            
                $update = Ngoonlinetestregistration::where('registrationid', $request->registration_id)
                    ->update(['status' => $request->status]);
            
                if ($update) {
                    return response()->json(['success' => true]);
                } else {
                    return response()->json(['success' => false], 500);
                }
}

}
