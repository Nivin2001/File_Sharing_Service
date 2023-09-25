@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $file->title }}</div>
                    <div class="card-body">
                        <p>Description: {{ $file->description }}</p>
                        <p>Total Downloads: {{ $file->total_downloads }}</p>
                        <!-- Other file details here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
