@include('partial.header')

    <div class="container" >

    <h2>Upload File</h2>



@if(session('error'))
    <div>
        <p>{{ session('error') }}</p>
    </div>
@endif

@if(session()->has('success'))
{{-- بدي افحص اذا كان المتغير فيه قيمة ام لا --}}
<div class="alert alert-sucess">
    {{session('success')}}
    {{-- // يطبعلي قيمة السيشن --}}
</div>
@endif

@if($errors->any())
{{-- اذا كان  يوجد اي ايرور  --}}
{{-- //validation --}}
<div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error )
    <li> {{$error}} </li>

    @endforeach
     </div>
     @endif


    <form action={{route('Files.store')}}  method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
         {{ csrf_field() }}
         @csrf
             <div class="form-floating mb-4 mt-3">
            <input type="file" @class(['form-control', 'is-invalid' => $errors->has('title')])  id="title" name = "title" placeholder="choose file">
            <label for="name">Title</label>
          </div>

          <div class="form-floating mb-4">
            <input type="text" @class(['form-control', 'is-invalid' => $errors->has('Description')]) id="Description" name ="Description" placeholder="enter Description ">
            <label for="Description">Description</label>
          </div>
          {{-- <a href="{{ route('Files.show', ['id' => $id]) }}"  type="button" class="btn btn-primary ">Get Link --}}

          <button type="submit" class="btn btn-primary ">Get Link</button>
    </form>
</div>
@include('partial.footer');
