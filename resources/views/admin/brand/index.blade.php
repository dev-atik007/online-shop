@extends('admin.layouts.app')
@section('content')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Admin Dashboard</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{route('admin.brand.list')}}">Brand</a></li>
                        <li class="breadcrumb-item"><a href="#">Brand List</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->




    <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <!-- <div class="card-header">
                        <h5>Brand List</h5> 
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row my-3">
                                        <div class="col-md-6 col-lg-6">
                                            <a class="btn btn-outline-info" href="{{ route('admin.brand.create') }}">Add Brand</a>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <p class="fw-bold align-right">Total Brand : {{ $brands->count() }}</p>
                                        </div>      
                                    </div>

                                    <div class="col-md-12 col-lg-12">
                                        <table id="data_table_set" class="table table-info table-responsive table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">S.L</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Summary</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Created At</th>
                                                    <th scope="col">Updated At</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-group-divider">
                                                @foreach ($brands as $key=>$brand)
                                                    <tr>
                                                        <td scope="col">{{ $key+1 }}</td>
                                                        <td scrope="col">{{ $brand->name }}</td>
                                                        <td scrope="col">{{ $brand->description }}</td>
                                                        <td scrope="col">{{ $brand->summary }}</td>
                                                        <td scrope="col">{{ $brand->image }}</td>
                                                        <td scrope="col">{{ $brand->status }}</td>
                                                        <td scope="col">{{ $brand->created_at }}</td>
                                                        <td scope="col">{{ $brand->updated_at }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-outline-success btn-sm">Edit</a>
                                                            <a href="{{ route('admin.brand.view', $brand->id) }}" class="btn btn-outline-warning btn-sm">View</a>
                                                            <a onclick="return confirm('Are You Sure To Delete This')" href="{{ route('admin.brand.delete', $brand->id) }}" class="btn btn-outline-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
@endsection