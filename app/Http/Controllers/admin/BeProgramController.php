<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class BeProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_program");
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
        $request->validate([
            'photo' => 'required',
            'title' => 'required',
            // 'description' => 'required',
            'status' => 'required',
        ]);

        $data = new Programs;
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/assets/uploads/website/services'), $imageName);
        $data->photo = $imageName;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_program'));
        // ->with('success', 'Category '.$request->name.' Added Successfuly')
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
         $programs = Programs::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_program', ['programs' => $programs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program_edit = Programs::find($id);
        if (is_null($program_edit)) {
            return redirect(route('admin_show_program'));
        } else {
            return view('BackEnd.add_program', ['program_edit' => $program_edit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Programs::find($request->id);
        $request->validate([
            'title' => 'required',
            // 'description' => 'required',
            'status' => 'required',
        ]);

        if (!empty($request->photo)) {
            $image_path = public_path('/assets/uploads/website/services/'.$data['file']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('/assets/uploads/website/services'), $imageName);
            $data->photo = $imageName;
        }

        $data->title = $request->title;
        $data->description = $request->description;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_program'));
        // ->with('success', 'Category '.$request->name.' Added Successfuly')

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Programs $id)
    {
        $image_path = public_path('/assets/uploads/website/services/'.$id->photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_show_program'));
        } else {
            $id->delete();
            return redirect()->back();
        }
    }
}
