<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pragatiwad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BePragatiwadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = Pragatiwad::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.pragatiwad', ['employee' => $employee]);
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

    public function approveData($id)
    {
        $employeeId = Pragatiwad::find($id);
            $employeeId->status = "1";
            $employeeId->approve = "1";
            $employeeId->save();

            return redirect(route('admin_pragatiwad'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pragatiwad $id)
    {
        $image_path = public_path('/assets/uploads/website/volunteer/'.$id['photo']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        if (is_null($id)) {
            return redirect(route('admin_pragatiwad'));
        } else {
            $id->delete();

            return redirect()->back();
        }
    }
}
