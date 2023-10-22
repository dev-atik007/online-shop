@extends('admin.layouts.app')
@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Admin Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.list')}}">Product</a></li>
                        <li class="breadcrumb-item"><a href="#">Product List</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
            <!-- [ breadcrumb ] end -->

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Product</h5> 
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
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row my-3">
                                    <div class="col-md-6 col-lg-6">
                                        <a class="btn btn-outline-info float-left" href="{{route('admin.product.create')}}">Add Product</a>
                                    </div>
                                    <div class="col-md-6 col-lg-6 float-right">
                                    <p class="fw-bold float-right">Total Product : </p>
                                    </div>      
                                </div>

                                <div class="row my-2">
                                    <div class="col-md-12 col-lg-12">
                                        <h1>Product List</h1>
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
                                                <th scope="col">Category</th>
                                                <th scope="col">Sub Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Feater Product</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">S.L</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Summary</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Sub Category</th>
                                                <th scope="col">Brand</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Weight</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Feater Product</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection