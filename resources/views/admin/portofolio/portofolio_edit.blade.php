@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            
        <h4 class="card-title">Portfolio Edit Page</h4> <br>
        <form method="POST" action="{{ route('update.portofolio') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $portofolio->id }}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="portofolio_name" name="portofolio_name" 
                    value="{{ $portofolio->portofolio_name }}">
                    @error('portofolio_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="portofolio_title" name="portofolio_title"
                    value="{{ $portofolio->portofolio_title }}">
                    @error('portofolio_title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                <div class="col-sm-10">
                    <textarea id="elm1" name="portofolio_description">
                        {{ $portofolio->portofolio_description }}
                    </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="portofolio_image">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ asset($portofolio->portofolio_image) }}" 
                    alt="Card image cap">
            </div>
            </div>
            <!-- end row -->
            <div class="col-sm-10">
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Portfolio">
            </div>
        </form>
        </div>
    </div>
</div> <!-- end col -->
</div>





</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection