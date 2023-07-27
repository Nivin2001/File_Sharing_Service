
<!DOCTYPE html>
<html>
<head>
    <title>File Download</title>
</head>
<body>
    <h1>Download File</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{route('Files.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title">
        <button type="submit"> Download</button>
    </form>


</body>
</html>
