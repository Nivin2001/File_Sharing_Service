@include('partial.header')

    <div class="container" >

    <h2>Upload File</h2>

                 <!-- Container to display the file link -->
                 @if(isset($fileLink))
<div>
    <a  class="progress-bar bg-info" role="progressbar"  href="{{ $fileLink }}" target="_blank" >{{ $fileLink }}</a>
<p style="margin:20px">File uploaded successfully. Click the link below to download:</p>




  </div>
@endif


@if(session('error'))
    <div>
        <p>{{ session('error') }}</p>
    </div>
@endif


    <form action={{route('Files.store')}}  method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         {{ csrf_field() }}
         @csrf
             <div class="form-floating mb-4 mt-3">
            <input type="file" class="form-control" id="title" name = "title" placeholder="choose file">
            <label for="name">Title</label>
          </div>

          <div class="form-floating mb-4">
            <input type="text" class="form-control" id="Description" name ="Description" placeholder="enter Description ">
            <label for="Description">Description</label>
          </div>
          {{-- <a href="{{ route('Files.show', ['id' => $id]) }}"  type="button" class="btn btn-primary ">Get Link --}}

          <button type="submit" class="btn btn-primary ">Get Link</button>
    </form>
</div>
@include('partial.footer');
