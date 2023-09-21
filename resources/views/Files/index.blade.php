@extends('Layouts.Master') <!-- Replace 'layout_name' with the actual name of your layout -->

<style>
    .text-center {
        margin-top: .375rem;
        font-size: 2.5rem;
        color: brown;
    }
     .text-center    h2  {
        color: black;
    }

    .content {
        width: 39rem;
        margin: 6.25rem auto;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn {
        padding: 0.9375rem 1.5625rem;
    }

    .img {
        width: 31.25rem;
    }

    @media (max-width: 45rem) {
        .text-center {
            font-size: 2rem;
        }

        .content {
            flex-direction: column;
        }

        .img {
            width: 21.25rem;
            margin-top: -3.25rem;
            margin-bottom: 1.25rem;
        }
    }
</style>

<body>

    @section('content')

    <!-- Your content for this section goes here -->
    <div class="container">
      {{-- <p> welcome  {{ Auth::user()->name }} </p> --}}

    <h1 class="text-center">Welcome to File Sharing Servive website</h1>
    {{-- <h2 class="text-center" coloe="black" > upload your files </h2> --}}
    @if(session()->has('success'))
    {{-- Check if the session variable has a value --}}
    <div class="alert alert-sucess">
        {{ session('success') }}
        {{-- Print the session value --}}
    </div>
    @endif

    <div class="content">
        <img class="img" src="assets/A.jpg" />

        <button class="btn" style="width: 100%">
            <a href="{{ route('Files.upload') }}" type="button" class="btn btn-danger">
                <i class="fa fa-upload"></i> Upload
            </a>
        </button>
    </div>



        <script>
            // JavaScript
            document.querySelector(".btn.text-start").addEventListener("click", function() {
                // Redirect to the login route
                window.location.href = "/login"; // Replace "/login" with your actual login route
            });
        </script>

        <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
</body>
</html>

