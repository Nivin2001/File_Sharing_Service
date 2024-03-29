<?php

namespace App\Http\Controllers;

use App\Events\FileDownloaded;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser;
use Illuminate\support\str;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\FileLink;

class FileController extends Controller
{
    public function index(Request $request)
    {
        return view ('Files.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function upload()
    {
        //
        return view('Files.upload');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         // Validate the request data
         $validate = $request->validate([
             'title' => 'required|max:255',
             'Description' => 'nullable|string|max:255',
         ]);



         // Check if the 'title' file was uploaded
         if ($request->hasFile('title')) {
             $titleFile = $request->file('title'); // Assign the uploaded file to a separate variable

             $extension = $titleFile->getClientOriginalExtension();
             $filename = pathinfo($titleFile->getClientOriginalName(), PATHINFO_FILENAME);

             // Store the 'title' file with a specific path
             $path = $titleFile->store('titles', 'uploads');

             $fileLink = Storage::disk('uploads')->url($path); // Generate the link using the Storage facade
//   Create a new File model and save it to the database
            $file = File::create([
                'title' => $filename, // Use the filename as the title
                'description' => $request->input('Description'),
                'file_path' => $path, // Store the file path in the database
                'total_downloades' =>0,
            ]);

             return view('Files.download')->with([
                'file' => $file,
                 'fileName' => $filename, // Pass the filename to the view
             ]) ->with('success','files upladed successfuuly');
         }

         else {

             return redirect()->back()->with('error', 'No title file was uploaded.');
         }
     }


     public function download(Request $request, $fileId )
     {
         // Find the file by its ID
         $file = File::find($fileId);

         if (!$file) {

             return redirect()->back()
                 ->with('msg', 'File not found')
                 ->with('type', 'danger');
         }

         // Get the file's local path
         $filePath = Storage::disk('uploads')->path($file->file_path);

         // Get the original filename (base name)
         $originalFilename = pathinfo($filePath, PATHINFO_BASENAME);

         $userAgent = $_SERVER['HTTP_USER_AGENT']; // Get the user agent from the HTTP request headers
         $ipAddress = $request->ip();


         $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=YOUR_API_KEY&ip={$ipAddress}");
         $data = $response->json();

         // Check the response structure and access the correct key for the country
         $country = $data['country_name'] ?? 'Unknown'; // Use a default value if the key is not found

         // Define the $downloaded_at variable with the current timestamp
         $downloaded_at = Carbon::now();

             // Assuming you have $file defined
         event(new FileDownloaded($file, $userAgent, $ipAddress, $country, $downloaded_at));

         // Return the file as a download with a custom name
         return response()->download($filePath, $originalFilename);
     }



     public function show($id)
     {
         // Retrieve the file by its ID
         $file = File::findOrFail($id);

         // You can retrieve the file link from the 'file_path' attribute of the 'File' model
         $fileLink = Storage::disk('uploads')->url($file->file_path);

         // Pass the $file variable to the view using compact or an array
         return view('Files.show', ['file' => $file]);

     }









    // public function download(Request $request, $fileId,$FileLink)
    // {
    //      // Find the file by its ID
    // $file = File::find($fileId);

    // if (!$file) {
    //     // Handle file not found (e.g., return an error response)
    //     return redirect()->back()
    //         ->with('msg', 'File not found')
    //         ->with('type', 'danger');
    // }
    //     // Get fileLink
    //     $path = $request->input('fileLink');

    //     // Check if the file exists
    //     if ($path && Storage::disk('uploads')->exists($path)) {
    //         // Get the file's local path
    //         $filePath = Storage::disk('uploads')->path($path);

    //         // Get the original filename (base name)
    //         $originalFilename = pathinfo($filePath, PATHINFO_BASENAME);

    //         // Return the file as a download with a custom name
    //         return response()->download($filePath, $originalFilename)->with('fileLink');
    //     }


    // }




}












