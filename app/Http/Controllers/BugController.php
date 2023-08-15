<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Submission;
use App\Models\Bug;
use ZipArchive;
use DOMDocument;
use File;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assignments = Assignment::all();
        return view('admin.bug.create', compact('assignments'));
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
            'assignment_id' => ['required'],
            'file' => ['required']
        ]);
        $assignment = Assignment::where('id', $request->assignment_id)->first();
        $zip = new ZipArchive();
        $status = $zip->open($request->file("file")->getRealPath());
        if ($status !== true) {
            throw new \Exception($status);
        } else {
            $storageDestinationPath= public_path("error/".$assignment->name);
            if (!\File::exists($storageDestinationPath)) {
                \File::makeDirectory($storageDestinationPath, 0755, true);
            }
            $zip->extractTo($storageDestinationPath);
            $zip->close();
        }
        $bugs = Bug::where('assignment_id', $request->assignment_id)->get();
        $bugsCount = count($bugs);
        if ($bugsCount == 0) {
            $submissions = $assignment->submissions;
            $path = public_path("error/".$assignment->name.'/sources');
            $files = File::files($path);
            foreach ($submissions as $submission) {
                $error_history = array();
                foreach ($files as $file) {
                    $name = $file->getFilename();
                    $pieces = explode(".", $name);
                    $matchFile = explode(".", $submission->file_name);
                    if ($pieces[0] == $matchFile[0]) {
                        $name = "error/".$assignment->name.'/sources/'.$file->getFilename();
                        $doc = new DOMDocument();
                        $doc->loadHTMLFile($name, LIBXML_NOWARNING | LIBXML_NOERROR);
                        $elements = $doc->getElementsByTagName('div');
                        if (!is_null($elements)) {
                            foreach ($elements as $element) {
                                $nodes = $element->childNodes;
                                foreach ($nodes as $node) {
                                    array_push($error_history, $node->nodeValue);
                                }
                            }
                        }
                        Bug::create([
                        'user_id' => $submission->user->id,
                        'submission_id' => $submission->id,
                        'assignment_id' => $request->assignment_id,
                        'errors' => serialize($error_history),
                    ]);
                        // print_r($error_history)."</br>";
                    }
                }
            }
            return back()
             ->with('success', 'You have successfully Uploaded  Error file.');
        } else {
               return back()
             ->with('success', 'You have Already Uploaded Error File.');

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
        $bug = Bug::where('id', $id)->first();
        $bugs = unserialize($bug->errors);

        return view("admin.bug.show", compact("bugs"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
