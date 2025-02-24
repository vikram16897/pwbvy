<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ngoonlinetestregistration;
use App\Models\Examination;
use App\Models\Examdata;

class FrHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("FrontEnd.index");
        
    }

     public function annual_report()
    {
        return view("FrontEnd.annual-report");
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function termsCondition()
    {
        return view("FrontEnd.terms-and-conditions");
    }


    public function donation_refund_policy()
    {
        return view("FrontEnd.donation-refund-policy");
    }

    public function create()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function examapanal(Request $request){
        return view('FrontEnd.exampanal');
    }
    public function exampstart(Request $request,$id){
        
        $userData = Ngoonlinetestregistration::join('classnames', 'classnames.id', '=', 'ngoonlinetestregistrations.class')
        ->select(['classnames.class_name', 'ngoonlinetestregistrations.*'])
        ->where('ngoonlinetestregistrations.user_id', $id)
        ->first();
    // dd($userData->exam_status);
        if($userData->exam_status!=1){

        
            $questions=Examination::where('class_id',$userData->class)->get();
            // dd($questions);
            $updateData = Ngoonlinetestregistration::where('user_id', $id)->update(['exam_status' => 1]);

            return view('FrontEnd.exampage',['questions'=>$questions,'userData'=>$userData]);
        }
        else{
            return view('FrontEnd.examformsubmit',['message'=>'You are alredy give the exam']);
        }
    }
    public function examsubmit(Request $request){
        // dd($request->all());
        // return view('FrontEnd.exampage');
        $userId = $request->input('user_id'); 
    $answers = $request->input('answers'); 

    $insertData = [];

    foreach ($answers as $questionId => $studentAns) {
        $insertData[] = [
            'user_id' => $userId,
            'question_id' => $questionId,
            'student_ans' => $studentAns,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    // Insert all records in one query
    Examdata::insert($insertData);
    return view("FrontEnd.examformsubmit",['message'=>'Answers saved successfully']);
    // return response()->json(['message' => 'Answers saved successfully']);
    }
}
