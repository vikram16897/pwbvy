<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\RequiredIf;

class BeRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_requirement");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'post1' => 'required',
            'sallery' => 'required',
            'blank_place' => 'required',
            'qualification' => 'required',
            'reg_charge' => 'required',
            'status' => 'required',
        ]);

        $data = new Requirement;
        $data->post1 = $request->post1;
        $data->sallery = $request->sallery;
        $data->blank_place = $request->blank_place;
        $data->qualification = $request->qualification;
        $data->reg_charge = $request->reg_charge;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_requirement'));
        // ->with('success', 'Category '.$request->name.' Added Successfuly')
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        $requirement = Requirement::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_requirement', ['requirement' => $requirement]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $requirementEdit = Requirement::find($id);
        if (is_null($requirementEdit)) {
            return redirect(route('admin_show_requirement'));
        } else {
            return view('BackEnd.add_requirement', ['requirementEdit' => $requirementEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Requirement::find($request->id);
        $request->validate([
            'post1' => 'required',
            'sallery' => 'required',
            'blank_place' => 'required',
            'qualification' => 'required',
            'reg_charge' => 'required',
            'status' => 'required',
        ]);

        $article->post1 = $request->post1;
        $article->sallery = $request->sallery;
        $article->blank_place = $request->blank_place;
        $article->qualification = $request->qualification;
        $article->reg_charge = $request->reg_charge;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_show_requirement'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Requirement $id)
    {
        $image_path = public_path('/assets/uploads/website/download/'.$id->file);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_show_download'));
        } else {
            $id->delete();
            return redirect()->back();
        }
    }
}
