@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            
        <h4 class="card-title">Update Multi Image</h4> <br> 
        <form method="POST" action="{{ route('update.multi.image') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="id" value="{{ $multiImage->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">About Multi Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" id="image" name="multi_image">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($multiImage->multi_image)) 
                        ? url($multiImage->multi_image) : url('upload/no_image.jpg') }}" 
                    alt="Card image cap">
            </div>
            </div>
            <!-- end row -->
            <div class="col-sm-10">
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Multi Image">
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