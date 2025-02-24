<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeTeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_team_member");
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

        $data = new Team;
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/assets/uploads/website/Guest_member'), $imageName);
        $data->photo = $imageName;
        $data->title = $request->title;
        $data->description = $request->description;
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
        $Team = Team::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_team_member', ['Team' => $Team]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Team_MemberEdit = Team::find($id);
        if (is_null($Team_MemberEdit)) {
            return redirect(route('admin_show_team_member'));
        } else {
            return view('BackEnd.add_team_member', ['Team_MemberEdit' => $Team_MemberEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = Team::find($request->id);
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
            $image_path = public_path('/assets/uploads/website/Guest_member/'.$article['photo']);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('/assets/uploads/website/Guest_member'), $imageName);
            $article->photo = $imageName;
        }
        $article->title = $request->title;
        $article->description = $request->description;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_show_team_member'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $id)
    {
        $image_path = public_path('/assets/uploads/website/Guest_member/'.$id->photo);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        if (is_null($id)) {
            return redirect(route('admin_show_team_member'));
        } else {
            $id->delete();

            return redirect()->back();
        }
    }
}
