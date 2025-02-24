<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('FrontEnd.Scholarship.scholarship');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Scholarship $scholarship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scholarship $scholarship)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scholarship $scholarship)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scholarship $scholarship)
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

        $record = DB::table('scholarships')
            ->where('registrationid', $registrationId)
            ->first();

        if ($record && $record->screenshot) {
            Storage::delete('screenshot/' . $record->screenshot);
        }

        $file = $request->file('screenshotafterpop');
        $newName = 'screenshot' . rand(10000, 99999) . '.jpg';
        $file->storeAs('screenshot', $newName);

        DB::table('scholarships')
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

        $record = DB::table('scholarships')
            ->where('registrationid', $registrationId)
            ->first();

        if ($record && $record->screenshot) {
            Storage::delete('screenshot/' . $record->screenshot);
        }

        $file = $request->file('screenshotpop');
        $newName = 'screenshot' . rand(10000, 99999) . '.jpg';
        $file->storeAs('screenshot', $newName);

        DB::table('scholarships')
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

        $exists = DB::table('scholarships')
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
        $request->validate([
            'name' => 'required',
            'fname' => 'required',
            'mname' => 'nullable',
            'email' => 'required|email',
            'mobile1' => 'required|digits:10',
            'aadhar' => 'required|digits:12',
            'dob' => 'required|date',
            'category' => 'required',
            'class' => 'required',
            'bank' => 'required',
            'accountholder' => 'required',
            'accountno' => 'required',
            'ifsc' => 'required',
        ]);

        $data = $request->only([
            'name', 'fname', 'mname', 'email', 'mobile1 as mobile', 'aadhar', 'dob', 'category', 'class', 'bank', 'accountholder', 'accountno', 'ifsc'
        ]);

        $data['dob'] = date('Y-m-d', strtotime($request->input('dob')));
        $data['status'] = 0;
        $data['registrationid'] = 'PWST' . sprintf('%06d', (100000 + DB::table('scholarships')->count()));

        if (DB::table('scholarships')->insert($data)) {
            return response()->json([
                'status' => 1,
                'message' => 'Registration successful.',
                'registration_id' => $data['registrationid'],
                'name' => $data['name'],
            ]);
        }

        return response()->json(['error' => 'Database insertion failed.'], 500);
    }

}
