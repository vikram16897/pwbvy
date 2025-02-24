<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.profile");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
        return redirect(route("login"));
    }
//->with('success', 'Ragistration Completed please try to Login')
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $article = User::find($request->id);


    if($request->sec == 2){
        $request->validate([
            'photo' => 'required',
        ]);


    if(empty($article->photo))
    {
        return redirect()->back()->with('error', 'photo is Important ');
    }
    if ($request->photo != null) {
        $image_path = public_path('BackEnd/uploads/master/user/'.$article['photo']);
        if (File::exists($image_path)) {
            File::delete($image_path);
        }
        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('/BackEnd/uploads/master/user'), $imageName);
        $article->photo = $imageName;
    }
}


    if($request->sec == 1){
        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $article->full_name = $request->full_name;
        $article->email = $request->email;
        $article->phone = $request->phone;
    }

    if($request->sec == 3){
        $request->validate([
            'password' => 'required',
            'password2' => 'required|same:password',
        ]);


        if($request->password3 == Auth::User()->password2){
        $article->password = Hash::make($request['password']);
        $article->password2 = $request->password2;
        }
    }
        $article->save();

        return redirect(route('admin_profile'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
