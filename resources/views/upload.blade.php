<!DOCTYPE html>
<html>
<body>

<div class="container">
    <div class="table">
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>File Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tableData as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->file_name }}</td>
                    <td><a href="{{ route('edit', ['id' => $item->id]) }}">📝</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

{{--    <img src="{{asset('storage/files/LinuxDirectories.webp')}}">--}}
    <form action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
        <input style="width: 56%" placeholder="User Name" type="text" name="name">
        <input style="margin-left: 63px;" type="file" name="fileToUpload" id="fileToUpload">
        <input class="submit" type="submit" value="Upload" name="submit">
    </form>
</div>

</body>

<style>
    form {
        background: #d3d3d369;
        width: 330px;
        height: 230px;
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
        margin: 0 41px 0 0;
    }
    .table {
        align-items: center;
        display: flex;
        justify-content: center;
        height: 216px;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
</style>
</html>
