@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            
        <h4 class="card-title">Footer Setup Page</h4>
        <form method="POST" action="{{ route('update.footer') }}">
            @csrf

            <input type="hidden" name="id" value="{{ $allfooter->id }}">

            <div class="row mb-3">
                <label for="number" class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="number" name="number" value="{{ $allfooter->number }}">
                </div>
            </div>
            <!-- end row -->
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                    <textarea required="" name="short_description" class="form-control" rows="5">{{ $allfooter->short_description }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="address" name="address" value="{{ $allfooter->address }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" id="email" name="email" value="{{ $allfooter->email }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="linkedin" class="col-sm-2 col-form-label">LinkedIn</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="linkedin" name="linkedin" value="{{ $allfooter->linkedin }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="instagram" name="instagram" value="{{ $allfooter->instagram }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="github" class="col-sm-2 col-form-label">Github</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="github" name="github" value="{{ $allfooter->github }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="copyright" name="copyright" value="{{ $allfooter->copyright }}">
                </div>
            </div>
            <!-- end row -->
            <div class="col-sm-10">
                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Footer">
            </div>
        </form>
        </div>
    </div>
</div> <!-- end col -->
</div>





</div>
</div>


@endsection