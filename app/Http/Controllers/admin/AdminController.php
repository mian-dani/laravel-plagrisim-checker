<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Assignment;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $assignments = Assignment::latest()->paginate(4);

        return view('admin.admin.index', compact('assignments'))->with('i', (request()->input('page', 1)-1)*4);
    }
    public function create()
    {
        $students = User::where('role','student')->get();
        return view('admin.admin.create', compact('students'));
    }
    public function store(Request $request)
    {
        // dd($request,);
        // $request->validate([
        //     'name' => 'required',
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'qualification' => 'required',
        //     'dob' => 'required',
        //     'phone_number' => 'required',
        //     'file' => 'required',

        // ]);

        $imageName= '';
        if ($request->file) {
            $imageName= $request->file->getClientOriginalName();
            $request->file->move(public_path('error'), $imageName);
        }

        $data= new Assignment();
        $data->user_id = $request->student_id;
        $data->error_file = $imageName;
        $data->save();
        return redirect()->route('admin.index')->with('success', 'Student created successfully.');
    }
    public function edit(User $student)
    {
        dd($student);
        return view('admin.admin.edit', compact('student'));
    }
    public function show(User $student)
    {
        return view('admin.admin.show', compact('student'));
    }
    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required',
            // 'password' => 'required',
            'qualification' => 'required',
            'dob' => 'required',
            'phone_number' => 'required',
            'file' => 'image|mimes:jpeg,jpg,png,gif',

        ]);

        $imageName= '';
        if ($request->file) {
            $imageName= time().'.'. $request->file->extension();
            $request->file->move(public_path('uploads'), $imageName);
            $student->file=$imageName;
        }

        $student->name=$request->name;
        // $student->password=$request->password;
        $student->qualification=$request->qualification;
        $student->dob=$request->dob;
        $student->phone_number=$request->phone_number;
        $student->update();
        return redirect()->route('admin.index')->with('info', 'Updated Record');
    }
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('admin.index')->with('delete', 'Deleted Record');
    }
}
