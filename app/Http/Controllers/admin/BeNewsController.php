<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class BeNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("BackEnd.add_news");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'news' => 'required',
        ]);

        $data = new News;
        $data->news = $request->news;
        $data->status = $request->status;
        $data->save();

        return redirect(route('admin_show_news'));
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
        $Newses = News::orderBy('created_at', 'DESC')->get();
        return view('BackEnd.show_news', ['Newses' => $Newses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $newsEdit = News::find($id);
        if (is_null($newsEdit)) {
            return redirect(route('admin_show_news'));
        } else {
            return view('BackEnd.add_news', ['newsEdit' => $newsEdit]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $article = News::find($request->id);
        $request->validate([
            'news' => 'required',
            'status' => 'required',
        ]);


        $article->news = $request->news;
        $article->status = $request->status;
        $article->save();

        return redirect(route('admin_show_news'));
        //->with('success', 'Blog '.$request->name.' Edited Successfuly')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $id)
    {
        if (is_null($id)) {
            return redirect(route('admin_show_news'));
        } else {
            $id->delete();
            return redirect()->back();
        }
    }
}
