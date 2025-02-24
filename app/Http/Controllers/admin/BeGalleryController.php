<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\File;

class BeGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_gallery");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
            'status' => 'required',
            'title' => 'required',
            'caption' => 'required',
        ]);

        $data = new Gallery;
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/assets/uploads/website/gallery'), $imageName);
        $data->photo = $imageName;
        $data->caption = $request->caption;
        $data->title = $request->title;
        $data->link = $request->link;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_gallery'));
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
            $gallery = Gallery::orderBy('created_at', 'DESC')->get();
            return view('BackEnd.show_gallery', ['gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $GalleryEdit = Gallery::find($id);
        if (is_null($GalleryEdit)) {
            return redirect(route('admin_show_gallery'));
        } else {
            return view('BackEnd.add_gallery', ['GalleryEdit' => $GalleryEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        {
            $article = Gallery::find($request->id);
            $request->validate([
                'title' => 'required',
                'status' => 'required',
                'caption' => 'required',
            ]);


            if(!empty($request->photo)){
                $request->validate([
                'photo' => 'required|image|max:2048',
            ]);
            }

            if(empty($article->photo))
            {
                return redirect()->back()->with('error', 'Image is Important ');
            }
            if ($request->photo != null) {
                $image_path = public_path('/assets/uploads/website/gallery/'.$article['photo']);
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $imageName = time().'.'.$request->photo->extension();
                $request->photo->move(public_path('/assets/uploads/website/gallery'), $imageName);
                $article->photo = $imageName;
            }
            $article->caption = $request->caption;
            $article->title = $request->title;
            $article->link = $request->link;
            $article->status = $request->status;
            $article->save();

            return redirect(route('admin_show_gallery'));
            //->with('success', 'Blog '.$request->name.' Edited Successfuly')
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $id)
    {
        $image_path = public_path('/assets/uploads/website/gallery/'.$id->photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_show_gallery'));
        } else {
            $id->delete();

            return redirect()->back();
        }
    }
    }

