<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use Yoeunes\Toastr\Facades\Toastr;

class CustomerController extends Controller
{
    public function list()
    {
        $customers = User::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'string|required',
            'username'  => 'string|required',
            'email'     => 'string|required|unique:customers',
            'password'  => 'required|min:6',
            'phone'     => 'required|string|digits:11',
            'image'     => 'nullable',
            'address'   => 'string|required',
            'status'    => 'string|required'
        ]);
        // dd($request->all());

        $customerImage = null;
        if($request->hasFile('image')){
            $customerImage = uniqid('customer_' . strtotime(date('Ymdhsis')), true) . '.' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('/uploads/customers/', $customerImage);
        }
        
        $customer = Customer::create([
            'fullname'  =>$request->firstname,
            'username'  =>$request->username,
            'email'     =>$request->email,
            'password'  =>bcrypt($request->password),
            'phone'     =>$request->phone,
            'image'     =>$customerImage,
            'address'   =>$request->address,
            'status'    =>$request->status,
        ]);
        if($customer)
        {
            Toastr::success('Customer Successfully Created :)', 'Create', ["PositionClass"=> "toast-top-right", "closeButton" => true,"progressBar"=>true, "preventDuplicates"=> true,]);
            return redirect()->route('admin.customer.list');
        }else{
            Toastr::error('Fill the Cridentials :)', 'Not Fount', ["PositionClass"=> "toast-top-right", "closeButton" => true,"progressBar"=>true, "preventDuplicates"=> true,]);
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        return view('admin.customer.edit');
    }
}
