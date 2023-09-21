@extends('Layouts.Master')
      <!DOCTYPE html>
<html>
<head>
    <title>Download Files</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
</head>
<body>

    @section('content')
    <h1 style="text-align: center">File uploaded successfully</h1>
    <div style="text-align: center;">
        <p class="fw-bold" style="font-size: 20px; margin: 20px ;"></p>
          <img src="{{ asset('assets/B.jpg') }}" alt="Good Job">
        <p>You did a great job!</p>
        <p>Click the link below to download your file:</p>


    @if (isset($fileName))
        <p>File Name: {{ $fileName }}</p>
    @endif
    @if (isset($fileLink))
           <!-- Download Button with Icon -->


    {{-- <p>File Link: <a href="{{ route('Files.download', ['fileLink' => $fileLink]) }}"  class="btn btn-success"> <i class="fas fa-download"></i> {{ $fileLink }} </a>  Download</p> --}}

         <p>File Link: <a href="{{ $fileLink }}">{{ $fileLink }}</a >  <i  class="fas fa-download"></i> Download</p>
    @endif

       <!-- Share Button with Icon -->
       <a href="{{ route('Files.share', ['fileLink' => $fileLink]) }}" class="btn btn-danger">
        <i class="fas fa-share"></i> Share
    </a>
@endsection
</body>
</html>


