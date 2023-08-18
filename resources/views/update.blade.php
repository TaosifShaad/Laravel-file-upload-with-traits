<!DOCTYPE html>
<html>
<body>

<div class="container">
    <form action="{{ route('update.post', ['id' => $tableData->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h3 style="text-align: center">Select file to upload:</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" name="name" value="{{$tableData['name']}}">
        <p>file: {{ $tableData['file_name'] }}</p>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input class="submit" type="submit" value="Upload" name="submit">
    </form>
</div>

</body>

<style>
    form {
        background: #d3d3d369;
        width: 300px;
        height: 300px;
        margin: 200px auto auto;
        border: 1px solid grey;
        text-align: center;
    }
    .container {
        max-width: 1300px;
        margin: auto;
    }
    input {
        margin: 10px 5px;
    }
    .submit {
        border-radius: 100px;
        background: dodgerblue;
        padding: 3px 6px;
        margin: 2px 5px;
        cursor: pointer;
    }
    .alert {
        color: red;
    }
</style>
</html>
