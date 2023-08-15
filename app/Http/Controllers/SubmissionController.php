<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Assignment;
use App\Models\User;
use App\Models\Bug;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $submissions = Submission::latest()->paginate(5);
        return view('admin.submission.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::where('role', 'student')->get();
        $assignments = Assignment::all();
        return view('admin.submission.create', compact('students', 'assignments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'student_id'=>['required'],
            'assignment_id' => ['required'],
            'files' => ['required']
        ]);
        $imageName= '';
        $files = $request->file('files');
        $students = User::where('role', 'student')->get();
        $assignment = Assignment::where('id', $request->assignment_id)->first();

        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $pieces = explode(".", $filename);
            foreach ($students as $student) {
                if ($student->roll_no == $pieces[0]) {
                    $imageName=$filename;
                    $file->move(public_path('assignments/'.$assignment->name), $imageName);
                    $data= new Submission();
                    $data->user_id = $student->id;
                    $data->assignment_id = $request->assignment_id;
                    $data->file_name = $imageName;
                    $data->save();
                }
                //   dd($student->roll_no);
            }
            // print_r($pieces[0]);
        }
        // dd('pk');



        //  dd($assignment->name);
        // if ($request->file) {
        //     $imageName=$request->file->getClientOriginalName();
        //     $request->file->move(public_path('assignments/'.$assignment->name), $imageName);
        // }
        // $data= new Submission();
        // $data->user_id = $request->student_id;
        // $data->assignment_id = $request->assignment_id;
        // $data->file_name = $imageName;
        // $data->save();
        return redirect()->route('submission.index')->with('success', 'Submission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $submission = Submission::where('id', $id)->first();
        // dd($id);
        $students = User::where('role', 'student')->get();
        $assignments = Assignment::all();

        return view('admin.submission.edit', compact('submission', 'students', 'assignments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id'=>['required'],
            'assignment_id' => ['required'],
            'file' => ['required']
        ]);
        $assignment = Assignment::where('id', $request->assignment_id)->first();
        $submission = Submission::where('id', $id)->first();
        $removePrevious = Assignment::where('id', $submission->assignment_id)->first();
        if ($request->file) {
            $file_path_previous = public_path('assignments/'.$removePrevious->name .'/'.$submission->file_name);
            if (file_exists($file_path_previous)) {
                unlink($file_path_previous);
            }
            $imageName=$request->file->getClientOriginalName();
            $file_path = public_path('assignments/'.$assignment->name .'/'.$imageName);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $request->file->move(public_path('assignments/'.$assignment->name), $imageName);
        }
        $submission->update([
          'user_id'=> $request->student_id,
          'assignment_id'=> $request->assignment_id,
          'file_name'=> $imageName
        ]);
        return redirect()->route('submission.index')->with('success', 'Submission Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submission = Submission::where('id', $id)->first();
        $file_path = public_path('assignments/'.$submission->assignment->name.'/'.$submission->file_name);
        if (file_exists($file_path)) {
            unlink($file_path);
        }
        $submission->delete();
        return redirect()->route('submission.index')->with('delete', 'Deleted Record');
    }
    public function student_error($id, $assignment_id){
        $bug = Bug::where('user_id', $id)->where('assignment_id',$assignment_id)->first();
        $bugs = [];
        if($bug){
        $bugs = unserialize($bug->errors);
        }


        return view("admin.bug.show", compact("bugs"));
    }
}
