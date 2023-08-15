<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\plagiarism;
use Illuminate\Support\Facades\Hash;
use File;
use ZipArchive;
use DOMDocument;

class plagiarismController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $plagiarisms = '';
        $assignments = Assignment::all();
        if($request->assignment_id){
                // dd($request);
            $plagiarisms = plagiarism::where('assignment_id', $request->assignment_id)->paginate(50);
        }else{
             $plagiarisms = plagiarism::latest()->paginate(10);

        }

        return view('admin.plagiarism.index', compact('plagiarisms', 'assignments'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $plagiarisms = plagiarism::all();
        $assignments = Assignment::all();
        return view('admin.plagiarism.create', compact('assignments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plagiarisms = plagiarism::where('assignment_id', $request->assignment_id)->get();
        $plagiarismsCount = count($plagiarisms);
        $assignment=Submission::where('assignment_id', $request->assignment_id)->get();
        if ($plagiarismsCount == 0) {
            for ($i=0; $i < count($assignment); $i++) {
                for ($j=0; $j <count($assignment) ; $j++) {
                    if ($i != $j) {
                        $name = "assignments/".$assignment[$i]->assignment->name.'/'.$assignment[$i]->file_name;
                        // dd($name);
                        $nameTwo = "assignments/".$assignment[$j]->assignment->name.'/'.$assignment[$j]->file_name;
                        $data = $this->plagiarismChecker($name, $nameTwo);
                        // dd($data);
                        // if ($data->plagiarism > 0) {
                        $plagiarism = plagiarism::create([
                           "user_id" => $assignment[$i]->user_id,
                           "submission_id" => $assignment[$i]->id,
                           'match_user_id' => $assignment[$j]->user->roll_no,
                           'assignment_id' => $assignment[$i]->assignment->id,
                           'plagiarism' => $data->plagiarism,
                           'performance' => $data->performance,
                           'matchLines' => serialize($data->matchLines)
                        ]);
                        // }
                    }
                }
            }
            return redirect()->route('plagiarism.index')->with('success', 'plagiarisms checked successfully.');
        } else {
            return redirect()->route('plagiarism.index')->with('warning', 'plagiarisms Already Calculated.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plagiarism = plagiarism::where('id', $id)->first();
        $plagiarisms = unserialize($plagiarism->matchLines);
        // dd($plagiarisms);
        return view('admin.plagiarism.show', compact('plagiarisms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function plagiarismChecker($fileOne, $secondFile)
    {
        $arrayOne = $this->readFileLineByLine($fileOne);
        // dd($arrayOne);
        $arrayTwo = $this->readFileLineByLine($secondFile);
        $arrayFilter =$this->applyArrayAllFilter($arrayOne);
        $arrayFilterTwo =$this->applyArrayAllFilter($arrayTwo);
        // $arrayFilter = $arrayOne;
        // $arrayFilterTwo = $arrayTwo;
        // dd($arrayOne, $arrayTwo);
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
        // dd($object);
        return $object;
    }
    public function remove_script_tags($fileOne, $secondFile)
    {
        $arrayOne = $this->readFileLineByLine($fileOne);
        dd($arrayOne);
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
}
