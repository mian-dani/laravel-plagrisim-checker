<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Bug;
use App\Models\Submission;
use App\Models\plagiarism;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Hash;
use File;
use ZipArchive;
use DOMDocument;

class TeacherController extends Controller
{
    public function index()
    {
        $assignments = Assignment::latest()->paginate(5);
        return view('admin.teacher.index', compact('assignments'))->with('i', (request()->input('page', 1)-1)*4);
    }
    public function create()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.teacher.create', compact('students'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','unique:App\Models\Assignment,name']
        ]);
        $path = public_path().'/assignments/' .$request->name;
        if (! File::exists($path)) {
            File::makeDirectory($path, $mode = 0777, true, true);
        }
        // $zip = new ZipArchive();
        // $status = $zip->open($request->file("file")->getRealPath());
        // dd($status);
        // if ($status !== true) {
        //     throw new \Exception($status);
        // } else {
        //     $storageDestinationPath= public_path("assignment01/");

        //     if (!\File::exists($storageDestinationPath)) {
        //         \File::makeDirectory($storageDestinationPath, 0755, true);
        //     }
        //     $zip->extractTo($storageDestinationPath);
        //     $zip->close();
        //     return back()
        //      ->with('success', 'You have successfully extracted zip.');
        // }

        // dd($request);


        // $imageName= '';
        // if ($request->file) {
        //     $imageName=$request->file->getClientOriginalName();
        //     $request->file->move(public_path('uploads'), $imageName);
        // }


        $data= new Assignment();
        $data->user_id = auth()->user()->id;
        $data->name = $request->name;
        $data->save();
        return redirect()->route('teacher.index')->with('success', 'Assignment created successfully.');
    }
    public function edit($id)
    {
        $assignment = Assignment::where('id', $id)->first();
        return view('admin.teacher.edit', compact('assignment'));
    }
    public function show($id)
    {

        // $assignment=Assignment::all();
        $path = public_path('error/');
        $files = File::files($path);
        $name = $files[12]->getFilename();
        $pieces = explode(".", $name);
        $error_history = array();
        if ($pieces[0] == "waqasahmad") {
            $name = "error/".$files[12]->getFilename();
            $doc = new DOMDocument();
            $doc->loadHTMLFile($name);
            $elements = $doc->getElementsByTagName('div');
            if (!is_null($elements)) {
                foreach ($elements as $element) {
                    $nodes = $element->childNodes;
                    foreach ($nodes as $node) {
                        array_push($error_history, $node->nodeValue);
                    }
                }
            }
            dd('ok', $error_history);
            // $name = "error/".$files[12]->getFilename();
            // $data = $this->remove_script_tags($name, $name);

            // dd($data);
        }
        dd($pieces[0]);
        dd($files[0]->getFilename());
        dd($files);
        // $assignment=plagiarism::all();
        // dd($assignment);
        // $name = "error/".$assignment->assignment;
        // $nameTwo = "error/main01.cpp";
        // $name = "error/test.txt";
        dd('ok');
        for ($i=0; $i < count($assignment); $i++) {
            for ($j=0; $j <count($assignment) ; $j++) {
                if ($i != $j) {
                    $name = "error/".$assignment[$i]->assignment;
                    $nameTwo = "error/".$assignment[$j]->assignment;
                    $data = $this->plagiarismChecker($name, $nameTwo);
                    if ($data->plagiarism > 0) {
                        $plagiarism = plagiarism::create([
                           "user_id" => $assignment[$i]->id,
                           'match_user_id' => $assignment[$j]->id,
                           'assignment_id' => 1,
                           'plagiarism' => $data->plagiarism,
                           'performance' => $data->performance,
                           'matchLines' => serialize($data->matchLines)
                        ]);
                    }
                }
            }
        }
        dd('okk');

        dd($data);
        return view('admin.teacher.show', compact('student'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        if ($request->password) {
            $student->update([
                'name'=> $request->name,
                'password' => Hash::make($request->password)
               ]);
        } else {
            $student->update([
                'name'=> $request->name,
               ]);
        }
        $student->update();
        return redirect()->route('teacher.index')->with('info', 'Updated Record');
    }
    public function destroy($id)
    {
        $plagiarisms = plagiarism::where('assignment_id', $id)->delete();
        // if($plagiarisms){
        //  $plagiarisms->delete();
        // }
        $Bug = Bug::where('assignment_id', $id)->delete();
        // if($Bug){
        //  $Bug->delete();
        // }
        $Submission = Submission::where('assignment_id', $id)->delete();
        // if($Submission){
        //  $Submission->delete();
        // }
        $assignment = Assignment::where('id', $id)->first();
        $path = public_path('assignments/'.$assignment->name);
        array_map('unlink', glob("$path/*.*"));
        rmdir($path);
        $assignment->delete();
        return redirect()->route('teacher.index')->with('delete', 'Deleted Record');
    }
    public function assignmentUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $assignment = Assignment::where('id', $id)->first();
        rename(public_path('assignments/'.$assignment->name), public_path('assignments/'.$request->name));
        $assignment->update([
            'name'=> $request->name,
        ]);
        return redirect()->route('teacher.index')->with('info', 'Record has been updated');
    }
    public function plagiarismChecker($fileOne, $secondFile)
    {
        $arrayOne = $this->readFileLineByLine($fileOne);
        $arrayTwo = $this->readFileLineByLine($secondFile);
        $arrayFilter =$this->applyArrayAllFilter($arrayOne);
        $arrayFilterTwo =$this->applyArrayAllFilter($arrayTwo);
        // dd($arrayFilter, $arrayFilterTwo);
        $line_match = array();
        $similarity = 0;
        for ($i = 0; $i < count($arrayFilter); $i++) {
            for ($j = 0; $j < count($arrayFilterTwo); $j++) {
                if ($arrayFilter[$i] == $arrayFilterTwo[$j]) {
                    $similarity++;
                    array_push($line_match, strval(($arrayFilter[$i])));
                }
            }
        }
        $performance = round(100 - ($similarity / count($arrayFilter) * 100), 2);
        $plagiarism = round($similarity / count($arrayFilter) * 100, 2);
        $object = (object) ['plagiarism' => $plagiarism, "matchLines" => $line_match, 'performance' => $performance];
        return $object;
    }
    public function remove_script_tags($fileOne, $secondFile)
    {
        $arrayOne = $this->readFileLineByLine($fileOne);
        $arrayTwo = $this->readFileLineByLine($secondFile);
        $arrayFilter =$this->applyHtmlAllFilter($arrayOne);
        $arrayFilterTwo =$this->applyHtmlAllFilter($arrayTwo);
        // dd($arrayFilter, $arrayFilterTwo);
        $line_match = array();
        $similarity = 0;
        for ($i = 0; $i < count($arrayFilter); $i++) {
            for ($j = 0; $j < count($arrayFilterTwo); $j++) {
                if ($arrayFilter[$i] == $arrayFilterTwo[$j]) {
                    $similarity++;
                    array_push($line_match, strval(($arrayFilter[$i])));
                }
            }
        }
        $performance = round(100 - ($similarity / count($arrayFilter) * 100), 2);
        $plagiarism = round($similarity / count($arrayFilter) * 100, 2);
        $object = (object) ['plagiarism' => $plagiarism, "matchLines" => $line_match, 'performance' => $performance];
        return $object;
    }
    public function arraySearch($arr, $search)
    {
        reset($arr);
        while (list($key, $val) = each($arr)) {
            if (preg_match("/$search/", $val)) {
                return $key;
            }
        }
    }
    public function array_except($array, $keys)
    {
        return array_diff_key($array, array_flip((array) $keys));
    }
    public function applyArrayAllFilter($arr)
    {
        $array = array_filter($arr);
        $array = array_map('trim', $array);
        ksort($array);
        $array = array_values($array);// sorted by original key order
        $search=$this->arraySearch($array, "main");
        $array = array_slice($array, $search + 1);
        $len = count($array);
        unset($array[$len -2]);
        $len1 = count($array);
        $output = $this->array_except($array, array_keys($array, '{'));
        $output = $this->array_except($output, array_keys($output, '}'));
        ksort($output);
        $output = array_values($output);
        return $output;
    }
    public function applyHtmlAllFilter($arr)
    {
        $newArray = array_map(function ($v) {
            return trim(strip_tags($v));
        }, $arr);

        $array = array_filter($newArray);
        $array = array_map('trim', $array);
        ksort($array);
        $array = array_values($array);// sorted by original key order
        $search=$this->arraySearch($array, "main");
        $array = array_slice($array, $search + 1);
        $len = count($array);
        unset($array[$len -2]);
        $len1 = count($array);
        $output = $this->array_except($array, array_keys($array, '{'));
        $output = $this->array_except($output, array_keys($output, '}'));
        ksort($output);
        $output = array_values($output);
        return $output;
    }
    public function readFileLineByLine($name)
    {
        $fp = @fopen(public_path($name), 'r');
        if ($fp) {
            $array = explode("\n", fread($fp, filesize(public_path($name))));
        }
        return $array;
    }
    //  public function readFileLineByLine()
    // {
    //  $object = (object) ['property' => 'Here we go', "name" => "Qasim"];
    //   return $object;
    // }
}
