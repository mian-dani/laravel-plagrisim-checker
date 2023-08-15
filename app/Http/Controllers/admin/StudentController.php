<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Bug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->latest()->paginate(4);
        return view('admin.students.index', compact('students'))->with('i', (request()->input('page', 1)-1)*4);
    }
    public function create()
    {
        return view('admin.students.create');
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'qualification' => 'required',
        //     'roll_no' => 'required',
        //     'phone_number' => 'required',
        //     // 'file' => 'required|image|mimes:jpeg,jpg,png,gif',

        // ]);

        $imageName= '';

        if ($request->file) {
            $imageName= time().'.'. $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $imageName);
        }

        $data= new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->qualification = $request->semester;
        $data->dob = $request->program;
        $data->roll_no = $request->roll_no;
        $data->role = 'student';
        $data->phone_number = $request->phone_number;
        $data->file = $imageName;
        $data->save();
        return redirect()->route('student.index')->with('success', 'Student created successfully.');
    }
    public function edit(User $student)
    {
        return view('admin.students.edit', compact('student'));
    }
    public function show(User $student)
    {
        $Assignments = Assignment::paginate(10);
        return view('admin.students.show', compact('student', 'Assignments'));
    }
    public function update(Request $request, User $student)
    {
        // dd($request, $request->file->extension());
        $request->validate([
            'name' => 'required',
            // 'password' => 'required',
            'qualification' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'file' => 'image|mimes:jpeg,jpg,png,gif',

        ]);

        $imageName= '';
        if ($request->file) {
            // dd('ok');
            $imageName= time().'.'. $request->file->extension();
            $request->file->move(public_path('uploads'), $imageName);
            $student->file=$imageName;
        }

        $student->name=$request->name;
        if ($request->password) {
            $student->password=Hash::make($request->password);
        }


        $student->qualification=$request->qualification;
        $student->email=$request->email;
        $student->dob = $request->program;

        $student->phone_number=$request->phone_number;
        if (auth()->user()->role == "student") {
            $student->role='student';
            $student->update();
            return redirect()->route('dashboard')->with('info', 'Updated Record');
        } else {
            $student->update();
            return redirect()->route('dashboard')->with('info', 'Updated Record');
        }
    }
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('delete', 'Deleted Record');
    }
    public function performance()
    {
        $bugs = Bug::where('user_id', auth()->user()->id)->paginate(10);
        return view('admin.students.performance', compact('bugs'))->with('i', (request()->input('page', 1)-1)*4);
        ;
    }
}
