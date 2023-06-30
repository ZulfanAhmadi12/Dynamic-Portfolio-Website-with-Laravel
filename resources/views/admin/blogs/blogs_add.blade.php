@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style type="text/css">
    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: #b70000;
        font-weight: 700px;
    } 
</style>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            
        <h4 class="card-title">Blog Insert Page</h4> <br>
        <form method="POST" action="{{ route('store.blogs') }}" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <label for="blog_category_id" class="col-sm-2 col-form-label">Blog Category Name</label>
                <div class="col-sm-10">
                    <select id="blog_category_id" name="blog_category_id" class="form-select" aria-label="Select one of them">
                        <option selected="">Select one of the categories</option>
                        @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->blog_category }}</option>
                        @endforeach
                    </select>
                    @error('blog_category_id')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="blogs_title" class="col-sm-2 col-form-label">Blog Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="blogs_title" name="blogs_title">
                    @error('blogs_title')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="blogs_tags" class="col-sm-2 col-form-label">Blog Tags</label>
                <div class="col-sm-10">
                    <input class="form-control" value="home,tech" type="text" data-role="tagsinput" name="blogs_tags">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="elm1" class="col-sm-2 col-form-label">Blog Description</label>
                <div class="col-sm-10">
                    <textarea id="elm1" name="blogs_description">
                    </textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Blog Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="blogs_image">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}" 
                    alt="Card image cap">
            </div>
            </div>
            <!-- end row -->
            <div class="col-sm-10">
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Insert Blog">
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