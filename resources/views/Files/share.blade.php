@extends('Layouts.Master')

<!DOCTYPE html>
<html>
<head>
    <title>Share File</title>
</head>
<body>
    <h1>Share File</h1>

    @if (isset($file))
        <h2>File Details</h2>
        <p><strong>Title:</strong> {{ $file->title }}</p>
        <p><strong>Description:</strong> {{ $file->Description }}</p>

        <h2>File Link</h2>
        <p>You can share the file using the following link:</p>
        <a href="{{ $file->file_link }}" target="_blank">{{ $file->file_link }}</a>

        <h2>Actions</h2>
        <p>You can perform the following actions:</p>
        <ul>
            <li><a href="{{ route('Files.download', ['fileLink' => $file->file_link]) }}" target="_blank">Download File</a></li>
            <li><a href="{{ route('home') }}">Back to Home</a></li>
        </ul>
    @else
        <p>File not found.</p>
    @endif
</body>
</html>
