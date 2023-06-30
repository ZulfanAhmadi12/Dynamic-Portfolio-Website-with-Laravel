@extends('admin.admin_master')
@section('admin')

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            
        <h4 class="card-title">Show Message Page</h4>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Contact Message</label>
                <div class="col-sm-10">
                    <textarea id="elm1" name="message">
                        {{ $message->message }}
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end col -->
</div>





</div>
</div>

@endsection