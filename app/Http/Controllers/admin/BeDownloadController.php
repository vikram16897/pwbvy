<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
class BeDownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_download");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'file' => 'required',
            'status' => 'required',
            'title' => 'required',
        ]);

        $data = new Download;
        $imageName = time().'.'.$request->file->extension();
        $request->file->move(public_path('/assets/uploads/website/download'), $imageName);
        $data->file = $imageName;
        $data->title = $request->title;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_download'));
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
        $Downloads = Download::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_download', ['Downloads' => $Downloads]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $DownloadEdit = Download::find($id);
        if (is_null($DownloadEdit)) {
            return redirect(route('admin_show_download'));
        } else {
            return view('BackEnd.add_download', ['DownloadEdit' => $DownloadEdit]);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Download::find($request->id);
        $request->validate([
            'title' => 'required',
            'status' => 'required',
        ]);

        if(!empty($request->file)){
            $request->validate([
            'file' => 'required',
        ]);
        }

        if(empty($article->file))
        {
            return redirect()->back()->with('error', 'file is Important ');
        }
        if ($request->file != null) {
            $image_path = public_path('/assets/uploads/website/download/'.$article['file']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->file->extension();
            $request->file->move(public_path('/assets/uploads/website/download'), $imageName);
            $article->file = $imageName;
        }
        $article->title = $request->title;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_show_download'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Download $id)
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
