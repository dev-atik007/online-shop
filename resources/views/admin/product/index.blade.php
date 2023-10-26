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
                                                <th scope="col">Image</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-group-divider">
                                            @foreach ($products as $key=>$product)
                                                <tr>
                                                    <td scope="col">{{ $key+1 }}</td>
                                                    <td scope="col">{{ $product->product_name }}</td>
                                                    <td scope="col">{{ $product->product_description }}</td>
                                                    <td scope="col">{{ $product->product_summary }}</td>
                                                    <td scope="col">{{ optional($product->category)->name }}</td>
                                                    <td scope="col">{{ optional($product->subcategory)->name }}</td>
                                                    <td scope="col">{{ optional($product->brand)->name }}</td>
                                                    <td scope="col">{{ $product->product_quantity }}</td>
                                                    <td scope="col">{{ $product->product_price }}</td>
                                                    <td scope="col">{{ $product->product_weight }}</td>
                                                    <td scope="col">{{ $product->status }}</td>
                                                    <td scope="col">{{ $product->product_photo }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-outline-success btn-sm">View</a>
                                                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                                        <a onclick="return confirm('Are You Sure To Delete This')" href="" class="btn btn-outline-danger btn-sm">Delete</a>
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

    </div>
@endsection