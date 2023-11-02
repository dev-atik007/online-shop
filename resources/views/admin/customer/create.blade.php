@extends('admin.layouts.app')
@section('content')



<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <a class="btn btn-outline-info float-left"
                                        href="{{route('admin.customer.list')}}">Customer List</a>
                                </div>
                                <div class="col-md-6 col-lg-6 float-right">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                <h1>Create Post</h1>
 
                                @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <ul class="p-0 m-0" style="list-style: none;">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>    
                                            @endforeach
                                        </ul>
                                    </div>  
                                @endif

                                    <form class="m-3" action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="firstname" name="firstname"
                                                placeholder="Enter First Name">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="username" class="form-label">User Name :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                placeholder="Enter User Name">
                                        </div>

                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter Email Address">
                                        </div>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Enter Password">
                                        </div>

                                        <div class="mb-3">
                                            <label for="photo" class="form-label">Photo :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="file" class="form-control" id="photo" name="image"
                                                placeholder="Photo">
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone"
                                                placeholder="phone">
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address :<span
                                                    class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" id="address" name="address"
                                                placeholder="Address">
                                        </div>
                                    
                                        <div class="row">
                                            <div class="col-md-4 col-lg-4">
                                                <div class="input-group mb-3">
                                                    <label for="status" class="form-label">Customer Status :<span
                                                            class="text-danger"> *</span></label>
                                                    <div class="input-group-prepend">
                                                        <label class="input-group-text" for="status">Options</label>
                                                    </div>
                                                    <select name='status' class="custom-select" id="status">
                                                        <option selected>Status</option>
                                                        <option value="active">Active</option>
                                                        <option value="inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>

@endsection

@push('scripts')
<!-- Summernote -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote1').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });
    $(document).ready(function () {
        $('#summernote2').summernote({
            height: 200,
        });
        $('.dropdrown-toggle').dropdown();
    });

</script>
<script>
    $('#is_parent').change(function (e) {
        e.preventDefault();
        var is_checked = $('#is_parent').prop('checked');
        // alert(is_checked);
        if (is_checked) {
            $('#parent_cat_div').addClass('d-none');
            $('#parent_cat_div').val('');
        } else {
            $('#parent_cat_div').removeClass('d-none');
        }
    });

</script>
@endpush
        