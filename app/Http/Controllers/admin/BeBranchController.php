<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BeBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_branch");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'c_code' => 'required',
            'w_num' => 'required',
            'place' => 'required',
            'panchayat' => 'required',
            'prakhand' => 'required',
            'sevika' => 'required',
            'shayika' => 'required',
            'supervisor' => 'required',
            'status' => 'required',
        ]);

        $data = new Branch();
        $data->c_code = $request->c_code;
        $data->w_num = $request->w_num;
        $data->place = $request->place;
        $data->panchayat = $request->panchayat;
        $data->prakhand = $request->prakhand;
        $data->sevika = $request->sevika;
        $data->shayika = $request->shayika;
        $data->supervisor = $request->supervisor;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_branch'));
        // ->with('success', 'Category '.$request->name.' Added Successfuly')
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

        $Branchs = Branch::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_branch', ['Branchs' => $Branchs]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $branchEdit = Branch::find($id);
        if (is_null($branchEdit)) {
            return redirect(route('admin_show_branch'));
        } else {
            return view('BackEnd.add_branch', ['branchEdit' => $branchEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        {
            $article = Branch::find($request->id);
            $request->validate([
                'c_code' => 'required',
                'w_num' => 'required',
                'place' => 'required',
                'panchayat' => 'required',
                'prakhand' => 'required',
                'sevika' => 'required',
                'shayika' => 'required',
                'supervisor' => 'required',
                'status' => 'required',
            ]);

            $article->c_code = $request->c_code;
            $article->w_num = $request->w_num;
            $article->place = $request->place;
            $article->panchayat = $request->panchayat;
            $article->prakhand = $request->prakhand;
            $article->sevika = $request->sevika;
            $article->shayika = $request->shayika;
            $article->supervisor = $request->supervisor;
            $article->status = $request->status;
            $article->save();

            return redirect(route('admin_show_branch'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $id)
    {

        if (is_null($id)) {
            return redirect(route('admin_show_branch'));
        } else {
            $id->delete();

            return redirect()->back();
        }
    }
}
