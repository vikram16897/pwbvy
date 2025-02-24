<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;

class BeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_slider");
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
        ]);

        $data = new Slider;
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/assets/uploads/website/slider'), $imageName);
        $data->photo = $imageName;
        $data->title = $request->title;
        $data->button_url = $request->button_url;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_slider'));
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
        $sliders = Slider::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_slider', ['sliders' => $sliders]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliderEdit = Slider::find($id);
        if (is_null($sliderEdit)) {
            return redirect(route('admin_show_slider'));
        } else {
            return view('BackEnd.add_slider', ['sliderEdit' => $sliderEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Slider::find($request->id);
        $request->validate([
            'title' => 'required',
            'status' => 'required',
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
            $image_path = public_path('/assets/uploads/website/slider/'.$article['photo']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('/assets/uploads/website/slider'), $imageName);
            $article->photo = $imageName;
        }
        $article->title = $request->title;
        $article->button_url = $request->button_url;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_show_slider'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $id)
    {
        $image_path = public_path('/assets/uploads/website/slider/'.$id->photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_show_slider'));
        } else {
            $id->delete();

            return redirect()->back();
        }
    }
}
