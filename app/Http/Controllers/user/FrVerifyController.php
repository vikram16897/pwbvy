<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\OldEmployee;

class FrVerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("FrontEnd.member_verify");
    }

    public function centre_verify(){
        return view("FrontEnd.centre_verify");
    }


    public function employee_verify(){
        return view("FrontEnd.member_employee_verify");
    }

    public function verificationData(){
        return view("FrontEnd.member_verify_data");
    }
    /**
     * Show the form for creating a new resource.
     */


     public function find_data(Request $request)
    {
        $request->validate([
            'reg_no' => 'required',
        ]);

        $dataEmployee = Employee::where('reg_no',$request->reg_no)->get('reg_no');
        $myArray = [];
        foreach($dataEmployee as $dataEmployeeData)
        {
            $myArray = $dataEmployeeData->reg_no;

        }
        if($myArray != null){
            $approveOrNot = Employee::where('reg_no',$request->reg_no)->first();
            if($approveOrNot->approve == 1 && $approveOrNot->status == 1)
            {
            $DownloadEdit = Employee::where('reg_no',$request->reg_no)->get();

            if (is_null($DownloadEdit)) {
                return redirect(route('FrontEnd_member_verify'))->with("error", $request->reg_no." Not valid number");
            } else {
                return view('FrontEnd.member_verify_data', ['DownloadEdit' => $DownloadEdit]);
            }
        }
        else{
            return redirect(route("FrontEnd_member_verify"))->with("success", $request->reg_no." Verification is successful");
        }
        }
        else{
            return redirect(route("FrontEnd_member_verify"))->with("error", $request->reg_no." Not valid number");
        }

        // $request->validate([
        //     'reg_no' => 'required',
        // ]);

        // $data = Employee::where('reg_no',$request->reg_no)->count('reg_no');

        // if($data == 1){
        //     return redirect(route("FrontEnd_member_verify"))->with("success", $request->reg_no." Verification is successful");
        // }
        // else{
        //     return redirect(route("FrontEnd_member_verify"))->with("error", $request->reg_no." Not valid number");
        // }

    }


    public function find_data_center(Request $request)
    {
        $request->validate([
            'phones' => 'required',
        ]);

        $data = Branch::where('c_code',$request->phones)->where("status","1")->count('c_code');

        if($data == 1){
            return redirect(route("FrontEnd_centre_verify"))->with("success", $request->phones." Verification is successful");
        }
        else{
            return redirect(route("FrontEnd_centre_verify"))->with("error", $request->phones." Not valid number");
        }

    }



    public function employee_verify_find_data(Request $request)
    {
        $request->validate([
            'phones' => 'required',
        ]);

        $dataEmployee = Employee::where('reg_no',$request->phones)->where("status","1")->where('approve',"1")->get('reg_no');
        $myArray = [];
        foreach($dataEmployee as $dataEmployeeData)
        {
            $myArray = $dataEmployeeData->reg_no;
        }
        if($myArray != null){

            $DownloadEdit = Employee::where('reg_no',$request->phones)->get();
            if (is_null($DownloadEdit)) {
                return redirect(route('FrontEnd_member_employee_verify'))->with("error", $request->phones." Not valid number");;
            } else {
                return view('FrontEnd.member_verify_data', ['DownloadEdit' => $DownloadEdit]);
            }
        }
        else{
            return redirect(route("FrontEnd_member_employee_verify"))->with("error", $request->phones." Not valid number");
        }

    }


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
