<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File/title>
    <style>
        h1 {
            font-size: 20px;
            margin-top: 24px;
            margin-bottom: 24px;
        }

        img {
            height: 60px;
        }
    </style>
</head>
<body>
    @include('partial.header')

    <div class="container">
        <div class="d-flex flex-column align-items-center justify-content-center mt-5">
            <h2>Upload File</h2>

            <!-- Rest of your form and content goes here -->

        </div>

        @if(session('error'))
            <div>
                <p>{{ session('error') }}</p>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-md-6 offset-md-3 mt-5">

        <form action={{route('Files.store')}}  method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            {{ csrf_field() }}
            @csrf



            <div class="form-group">
            <label for="exampleInputName">Full Name</label>
            <input type="text" name="fullname" class="form-control" id="exampleInputName" placeholder="Enter your name and surname" required="required">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="required">
        </div>

        <hr>

        <div class="form-floating mb-4 mt-3">
            <input type="file" @class(['form-control', 'is-invalid' => $errors->has('title')])
            id="title" name = "title" placeholder="choose file">
            <label for="name">Upload your file</label>
        </div>

        <div class="form-floating mb-4">
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('Description')]) id="Description" name ="Description" placeholder="enter Description ">
            <label for="Description">Description</label>
        </div>


        <hr>

            {{-- <a href="{{ route('Files.show', ['id' => $id]) }}"  type="button" class="btn btn-primary ">Get Link --}}

            <button type="submit" class="btn btn-danger ">Get Link</button>
        </form>
    </div>
    @include('partial.footer');
    </div>
</body>
</html>
