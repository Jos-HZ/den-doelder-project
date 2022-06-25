@extends('layouts.master')

@section('content')
<body>

<div class="container mt-4">

    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
    @csrf
        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" name="file" placeholder={{__("Choose File")}} id="file">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="submit">{{__("Submit")}}</button>
            </div>
        </div>
    </form>
</div>

</div>
</body>
@endsection




