<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Illuminate\support\str;
use Illuminate\Support\Facades\Validator;




class FileController extends Controller
{
    public function index(Request $request)
    {
        return view ('Files.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Files.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'title'=> 'required|max:255',
            'Description'=>'nullable|string|max:255',
        ]);

        $file=File::create($request->all());//read all date
        $file->save();
        if($request->hasFile('title'))
        {
            $file=$request->file('title');
                   $path=$file->store('/titles','uploads');//upload
            $fileLink = Storage::disk('uploads')->url($path); // Generate the link using the Storage facade

            return view('Files.share')->with([
                'fileLink' => $fileLink
            ]);


        }else {
            // Handle the case when no file is uploaded
            // Redirect back with an error message or do other appropriate actions
            return redirect()->back()->with('error', 'No file was uploaded.');
        }

    }


    public function download()
    {

//get fileLink
        $path = request()->post('fileLink');
        //check if the file exsist
if($path && Storage::disk('uploads')->exists($path)){
    $file = Storage::disk('uploads')->path($path);
    return response()->download($file);

}
return redirect()->back()
                ->with('msg', 'File not found')
                ->with('type', 'danger');


    }
    

//     public function share($id)
// {
//     $file = File::findOrFail($id);
//     $fileLink = route('Files.create', ['fileLink' => $file->fileLink]);
//     return view('Files.share', compact('fileLink '));
// }

 // public function show($id)
    // {
    //     $file = File::findOrFail($id);
    //     $fileLink = Storage::disk('uploads')->url($file->path);

    //     return view('Files.show')->with([
    //         'file' => $file,
    //         'fileLink' => $fileLink,
    //     ]);
}












