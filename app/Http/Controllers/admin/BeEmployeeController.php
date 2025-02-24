<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.show_employee");
    }

    /**
     * Show the form for creating a new resource.
     */

     public function id_card(string $id)
    {
        $employeeId = Employee::find($id);
        if (is_null($employeeId)) {
            return redirect(route('admin_employee'));
        } else {
            return view('BackEnd.volunteer_id', ['employeeId' => $employeeId]);
        }
    }

    public function welcome(string $id)
    {
        $employeeId = Employee::find($id);
        if (is_null($employeeId)) {
            return redirect(route('admin_employee'));
        } else {
            return view('BackEnd.volunteer_welcome', ['employeeId' => $employeeId]);
        }
    }

    public function appointment(string $id)
    {
        $employeeId = Employee::find($id);
        if (is_null($employeeId)) {
            return redirect(route('admin_employee'));
        } else {
            return view('BackEnd.volunteer_appointment', ['employeeId' => $employeeId]);
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
    public function show()
    {
        // $employee = Employee::orderBy('created_at', 'DESC')->get();
        // return view('BackEnd.show_employee', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employeeId = Employee::find($id);
        if (is_null($employeeId)) {
            return redirect(route('admin_employee'));
        } else {
            return view('BackEnd.volunteer_Edit', ['employeeId' => $employeeId]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Employee::find($request->id);
        $request->validate([
            'status' => 'required',
        ]);

        if(!empty($request->file)){
            $request->validate([
            'photo' => 'required',
        ]);
        }

        if(empty($article->photo))
        {
            return redirect()->back()->with('error', 'file is Important ');
        }
        if ($request->photo != null) {
            $image_path = public_path('/assets/uploads/website/volunteer/'.$article['photo']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('/assets/uploads/website/volunteer'), $imageName);
            $article->photo = $imageName;
        }

        if ($request->sign != null) {
            $image_path = public_path('/assets/uploads/website/volunteer/sign/'.$article['sign']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->sign->extension();
            $request->sign->move(public_path('/assets/uploads/website/volunteer/sign/'), $imageName);
            $article->sign = $imageName;
        }

        if ($request->aadhar != null) {
            $image_path = public_path('/assets/uploads/website/volunteer/aadhar/'.$article['aadhar']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->aadhar->extension();
            $request->aadhar->move(public_path('/assets/uploads/website/volunteer/aadhar/'), $imageName);
            $article->aadhar = $imageName;
        }
        $article->name = $request->name;
        $article->fname = $request->fname;
        $article->dob = $request->dob;
        $article->age = $request->age;
        $article->ward = $request->ward;
        $article->gender = $request->gender;
        $article->adhar = $request->adhar;
        $article->language = $request->language;
        $article->caste = $request->caste;
        $article->address = $request->address;
        $article->panchayat = $request->panchayat;
        $article->post_office = $request->post_office;
        $article->block = $request->block;
        $article->sub_division = $request->sub_division;
        $article->district = $request->district;
        $article->state = $request->state;
        $article->pincode = $request->pincode;
        $article->email = $request->email;
        $article->qualification = $request->qualification;
        $article->work_experience = $request->work_experience;
        $article->mob1 = $request->mob1;
        $article->eighth = $request->eighth;
        $article->tenth = $request->tenth;
        $article->twelveth = $request->twelveth;
        $article->post_area = $request->post_area;
        $article->designation = $request->designation;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_employee'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
