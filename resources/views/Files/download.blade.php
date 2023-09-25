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

           <!-- Download Button with Icon -->

           <a href="{{ route('Files.download', $file->id) }}" class="btn btn-outline-danger">
            <i class="fas fa-check"></i> download
        </a>

        <!-- Show Button with Icon -->
        <a href="{{ route('Files.show', $file->id) }}" class="btn btn-outline-primary">
            <i class="fas fa-check"></i> Show
        </a>


@endsection
</body>
</html>


