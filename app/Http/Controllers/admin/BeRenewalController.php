<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeRenewalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.show_renewal");
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
