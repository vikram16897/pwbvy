<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class FrPwbvy_centerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Branch::orderBy('created_at', 'ASC')->get()->take(10);
        $branchData = Branch::orderBy('created_at', 'ASC')->get();
        return view('FrontEnd.pwbvy_center', compact('downloads','branchData'));
    }


}
