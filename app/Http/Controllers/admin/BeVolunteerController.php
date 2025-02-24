<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OldEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeVolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $OldEmployees = OldEmployee::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.old_volunteer', ['OldEmployees' => $OldEmployees]);
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
    public function destroy(OldEmployee $id)
    {
        $image_path = public_path('/assets/uploads/website/uploads/'.$id->profile_pic);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_volunteer'));
        } else {
            $id->delete();
            return redirect()->back();
        }
    }
}
