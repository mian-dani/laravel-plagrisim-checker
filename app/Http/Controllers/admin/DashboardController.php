<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\plagiarism;
use App\Models\Bug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $assignments = Assignment::all();
        $performance_array = array();
        $array_labels = [];
        $bugsCount = 0;
        $assignmentCount_label = count($assignments);
        for ($i = 0; $i < $assignmentCount_label; $i++) {
            array_push($array_labels, $i + 1);
        }
        if (auth()->user()->role == "teacher") {
            foreach ($assignments as $assignment) {
                $bugs = Bug::where('assignment_id', $assignment->id)->get();
                foreach($bugs as $bug){
                     $bugsCount += count(unserialize($bug->errors));
                }
                 array_push($performance_array,  $bugsCount);
                 $bugsCount = 0;

           }
        } else {
            foreach ($assignments as $assignment) {
                $bugs = Bug::where('assignment_id', $assignment->id)->where('user_id', auth()->user()->id)->first();
                if ($bugs) {
                    $errorCount = count(unserialize($bugs->errors));
                    if ($errorCount >= 4) {
                        array_push($performance_array, 40);
                    } elseif ($errorCount == 3) {
                        array_push($performance_array, 60);
                    } elseif ($errorCount == 2) {
                        array_push($performance_array, 70);
                    } elseif ($errorCount == 1) {
                        array_push($performance_array, 80);
                    } else {
                        array_push($performance_array, 100);
                    }
                }
            }
        }
        // dd($performance_array);
        if (auth()->user()->role == "teacher") {
            $userCount = User::where('role', 'student')->count();
            $assignmentCount = Assignment::all()->count();
            $plagiarismCount = plagiarism::where('plagiarism', '>', 0)->count();
        } else {
            $assignmentCount = Assignment::all()->count();
            $userCount = Submission::where('user_id', auth()->user()->id)->count();
            $plagiarismCount = $assignmentCount - $userCount;
        }
        // dd($performance_array);
        return view('admin.dashboard', compact("assignments", 'performance_array', 'userCount', 'assignmentCount', 'plagiarismCount', 'array_labels'));
    }
    public function showErrors(Request $request){
        $bugs = Bug::where('assignment_id', $request->assignment_id)->get();
        $total_errors = array();
        for ($i=0; $i <count($bugs) ; $i++) {
            $errors = unserialize($bugs[$i]->errors);
            foreach($errors as $error){
                array_push($total_errors, $error);

            }
        }
        $plagiarisms = array_count_values($total_errors);

        // dd($vals);
    //   return view('');
    return view('admin.admin.error', compact('plagiarisms'));
    }
}
