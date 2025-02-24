<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class FrJoinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("FrontEnd.member_join");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        //   if(!empty($request->adhar)){
        //     $request->validate([
        
        //     ]);
        // }
        // else{
        //     $request->validate([
        //         'pan' => ['required', 'regex:/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/','unique:tbl_volunteer'],
        //     ]);
        // }
        
        
        $request->validate([
                    'adhar' => ['required', 'unique:tbl_volunteer'], //'regex:/^[2-9]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}$/',
            'name' => 'required',
            'fname' => 'required',
            'dob' => 'required',
            // 'age' => 'required',
            'gender' => 'required',
            'caste' => 'required',
            'address' => 'required',
            'ward' => 'required',
            'panchayat' => 'required',
            'post_office' => 'required',
            'block' => 'required',
            'sub_division' => 'required',
            'district' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'email' => 'required',
            'qualification' => 'required',
            'work_experience' => 'required',
            'mob1' => 'required',
            'eighth' => 'required',
            'tenth' => 'required',
            'twelveth' => 'required',
            'photo' => 'required|image|max:2048',
            'sign' => "required",
            'designation' => 'required',
            'aadhar' => 'required',
            
        ]);

      

        $data = new Employee;
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/assets/uploads/website/volunteer'), $imageName);
        $data->photo = $imageName;

        $imageName_sign = time().'.'.$request->sign->extension();
        $request->sign->move(public_path('/assets/uploads/website/volunteer/sign'), $imageName_sign);
        $data->sign = $imageName_sign;

        $imageName_adhar = time().'.'.$request->aadhar->extension();
        $request->aadhar->move(public_path('/assets/uploads/website/volunteer/aadhar'), $imageName_adhar);
        $data->aadhar = $imageName_adhar;

        // $data->pan = $request->pan;
        $data->name = $request->name;
        $data->fname = $request->fname;
        $data->dob = $request->dob;
        $data->age = $request->age;
        $data->gender = $request->gender;
        $data->adhar = $request->adhar;
        $data->caste = $request->caste;
        $data->address = $request->address;
        $data->ward = $request->ward;
        $data->panchayat = $request->panchayat;
        $data->post_office = $request->post_office;
        $data->block = $request->block;
        $data->sub_division = $request->sub_division;
        $data->district = $request->district;
        $data->state = $request->state;
        $data->pincode = $request->pincode;
        $data->email = $request->email;
        $data->qualification = $request->qualification;
        $data->work_experience = $request->work_experience;
        $data->mob1 = $request->mob1;
        $data->eighth = $request->eighth;
        $data->tenth = $request->tenth;
        $data->twelveth = $request->twelveth;
        $data->designation = $request->designation;
        $data->ip_address = $request->ip();
        $data->browser = $request->header('User-Agent');
        $data->status = "0";
        $data->approve = "0";
        $id = $this->generateRegistrationId();
        $data['reg_no'] = $id;


        $success = $data->save();
        if($success){
        return redirect(route('FrontEnd_member_join'))->with('success', 'REGISTERATION is successfull this is your REGISTERATION ID '.$id.' Added Successfuly');
        }
        else{
            return redirect(route('FrontEnd_member_join'))->with('error', 'something Error !');
        }
    }


    function generateRegistrationId() {
        $id = 'PWBVY' . mt_rand(10000, 99999);
        if ($this->registrationIdExists($id)) {
            return $this->generateRegistrationId();
        }
        return $id;
    }


    function registrationIdExists($id) {
        return Employee::where('reg_no', $id)->exists();
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
