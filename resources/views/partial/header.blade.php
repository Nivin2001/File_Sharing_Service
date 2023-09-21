
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File Upload Success</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <header class="mb-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <!-- Brand/logo -->
                <a class="text-danger" class="navbar-brand" href="#">FileShare</a>

                <!-- Toggler/collapsible Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @yield('nav')
              <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('Files.upload')}}">Upload</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('Files.download',[$fileLink=>'fileLink'])}}">Dowmload</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <!-- Add the Login link below -->
                    <li class="nav-item">
                        <a class=" nav-link" href="/login">Login</a>
                    </li>

                    <li class="nav-item">
                        <a class=" nav-link" href="/register">Sign up</a>
                    </li>

                    {{-- <button class="btn btn-danger text-start">Login</button> --}}

                </ul>
{{--
                {{ Auth::user()->name }} --}}



              </div>
            </div>
          </nav>
    </header>
