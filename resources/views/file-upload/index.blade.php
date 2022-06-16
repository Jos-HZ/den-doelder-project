@extends('layouts.master')

@section('content')

    <!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<body>
<div>
    <form method="POST" enctype="multipart/form-data" id="upload-file" action="{{ url('store') }}" >
        @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <input type="file" name="file" placeholder="Choose file" id="file">
                    @error('file')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
            </div>
    </form>
</div>

</div>
</body>
</html>
@endsection




