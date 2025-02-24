<?php

namespace App\Http\Controllers\admin;

use App\Models\Examination;
use App\Models\Classname;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
// use Illuminate\Http\Request;
use App\Models\Examdata;
// use App\Models\Examination;
use App\Models\User;

class ExaminationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Fetch questions with their corresponding class names
    $questions = Examination::join('classnames', 'examinations.class_id', '=', 'classnames.id')
    ->select('examinations.*', 'classnames.class_name')
    ->get();

        // Pass the data to the view
        return view("BackEnd.list_question", compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(Request $request)
    {
          // Fetch all classes from the Classname model
    $classes = Classname::all();
    // Pass the class list to the view
    return view('BackEnd.create_question', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'option1' => 'required|string|max:255',
            'option2' => 'required|string|max:255',
            'option3' => 'required|string|max:255',
            'option4' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'className' => 'required|string',
        ], [
            'question.required' => 'The question field is required.',
            'option1.required' => 'Option 1 is required.',
            'option2.required' => 'Option 2 is required.',
            'option3.required' => 'Option 3 is required.',
            'option4.required' => 'Option 4 is required.',
            'answer.required' => 'The answer field is required.',
            'className.required' => 'Please select a class name.',
        ]);

        // Store the data in the database
        $question = new \App\Models\Examination();
        $question->question = $request->input('question');
        $question->option_1 = $request->input('option1');
        $question->option_2 = $request->input('option2');
        $question->option_3 = $request->input('option3');
        $question->option_4 = $request->input('option4');
        $question->answer = $request->input('answer');
        $question->class_id = $request->input('className');
        $question->save();

        // Redirect with a success message
        return redirect()->back()->with('success', 'Question stored successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Examination $examination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $id=$request->id;
        // Fetch the question based on the ID
        $question = Examination::findOrFail($id);
        
        // Fetch all classes
        $classes = Classname::all();
        
        // Return both the question and class list in JSON format
        return response()->json([
            'question' => $question,
            'classes' => $classes,
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {   
        // dd($request->all());
        // Validate the incoming request data
        $validated = $request->validate([
            'question' => 'required|string|max:255',
            'option_1' => 'required|string|max:255',
            'option_2' => 'required|string|max:255',
            'option_3' => 'required|string|max:255',
            'option_4' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
            'class_id' => 'required|integer',  // This should match the expected input for class ID (assuming it's an integer)
        ]);

        try {
            $id = $request->id;
            $question = Examination::findOrFail($id);  // Using findOrFail to automatically throw an exception if not found

            $question->update([
                'question' => $request->input('question'),
                'option_1' => $request->input('option_1'),
                'option_2' => $request->input('option_2'),
                'option_3' => $request->input('option_3'),
                'option_4' => $request->input('option_4'),
                'answer' => $request->input('answer'),
                'class_id' => $request->input('class_id'),  // Corrected to class_id
            ]);
            return response()->json(['success' => 'Question updated successfully!']);
        } catch (\Exception $e) {
            // Logging the error for debugging
            Log::error('Error updating question: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to update question'], 500);
        }

        // Redirect with a success message
        // return redirect()->back()->with('success', 'Question updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        try {
            $question = Examination::find($id);
            $question->delete();
            
            return response()->json(['success' => 'Question deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete question'], 500);
        }
        //
    }

    public function classList(Request $request){

        $className = Classname::select('classnames.id','classnames.class_name')
        ->get();
    
            // Pass the data to the view
            return view("BackEnd.list_class", compact('className'));
    }

    public function classedit(Request $request)
    {
        $id=$request->id;
        // Fetch the question based on the ID
        // $question = Examination::findOrFail($id);
        
        // Fetch all classes
        $classes = Classname::findOrFail($id);
        
        // Return both the question and class list in JSON format
        return response()->json([
            // 'question' => $question,
            'classes' => $classes,
        ]);
    }

    public function classdestroy(Request $request)
    {
        $id=$request->id;
        try {
            $question = Classname::find($id);
            $question->delete();
            
            return response()->json(['success' => 'Class deleted successfully!']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to delete question'], 500);
        }
        //
    }
    public function classupdate(Request $request)
    {   
        // dd($request->all());
        // Validate the incoming request data
        $validated = $request->validate([
            'class_name' => 'required|string|max:255',
        ]);

        try {
            $id = $request->id;
            $question = Classname::findOrFail($id);  // Using findOrFail to automatically throw an exception if not found

            $question->update([
                'class_name' => $request->input('class_name'),
            ]);
            return response()->json(['success' => 'class updated successfully!']);
        } catch (\Exception $e) {
            // Logging the error for debugging
            Log::error('Error updating question: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to update question'], 500);
        }

        // Redirect with a success message
        // return redirect()->back()->with('success', 'Question updated successfully!');
    }

public function classstore(Request $request)
{
    $request->validate([
        'class_name' => 'required|string|max:255',
    ]);

    // Create the new class
    $class = new Classname();
    $class->class_name = $request->class_name;
    $class->save();

    // Return a success response
    return response()->json(['success' => 'Class added successfully']);
}

public function usersExamResults()
{
    // Get all unique user IDs from examdatas table
    $userIds = Examdata::distinct()->pluck('user_id');
// dd($userIds);
    $usersResults = [];

    foreach ($userIds as $userId) {
        // Get user details
        $user = User::find($userId);
// dd($user);
        // Get user's answers
        $userAnswers = Examdata::where('user_id', $userId)->get();

        // Get correct answers from examinations table
        $questions = Examination::whereIn('id', $userAnswers->pluck('question_id'))->get()->keyBy('id');

        // Initialize counts
        $totalQuestions = $userAnswers->count();
        // dd($totalQuestions);
        $correctCount = 0;

        foreach ($userAnswers as $answer) {
            if (isset($questions[$answer->question_id]) && $questions[$answer->question_id]->answer == $answer->student_ans) {
                $correctCount++;
            }
        }

        // Calculate incorrect answers
        $wrongCount = $totalQuestions - $correctCount;

        // Calculate percentage
        $percentage = ($totalQuestions > 0) ? ($correctCount / $totalQuestions) * 100 : 0;

        // Store result in array
        $usersResults[] = [
            'user_id' => $user->id,
            'name' => $user->full_name,
            'total_questions' => $totalQuestions,
            'correct_answers' => $correctCount,
            'wrong_answers' => $wrongCount,
            'percentage' => number_format($percentage, 2),
        ];
    }

    return view('BackEnd.users-exam-results', compact('usersResults'));
}


}
