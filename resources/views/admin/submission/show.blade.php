@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
    <div class="card mb-4">
    <div class="card-header p-3 pb-0">

    </div>
    <div class="card-body p-3 pt-0">
    <hr class="horizontal dark mt-0 mb-4">
    <div class="d-flex justify-content-around row">
    <div class="col-lg-6 col-md-6 col-12">
    <div class="d-flex">
    <div>
    <img src="{{asset('uploads/'.$student->file)}}" class="avatar avatar-xxl me-3" alt="product image">
    </div>
    <div>
    <h6 class="text-lg mb-0 mt-2">{{$student->name}}</h6>
    <p class="text-sm mb-3">{{$student->email}}</p>
    </div>
    </div>
    </div>

    </div>
    <div class="m-5 mt-sm-n6 row mt-lg-4">
        <div class="col-lg-3 col-12 ms-auto">
            <h6 class="mb-3">Date Of Birth</h6>
            <div class="d-flex justify-content-between">
            <span class="mb-2 text-sm">
                {{$student->dob}}
            </span> 
            </div>
            </div>
            <div class="col-lg-3 col-12 ms-auto">
                <h6 class="mb-3">Phone Number</h6>
                <div class="d-flex justify-content-between">
                <span class="mb-2 text-sm">
                    {{$student->phone_number}}
                </span> 
                </div>
                </div>
                <div class="col-lg-3 col-12 ms-auto">
                    <h6 class="mb-3">Qualification</h6>
                    <div class="d-flex justify-content-between">
                    <span class="mb-2 text-sm">
                        {{$student->qualification}}
                    </span> 
                    </div>
                    </div>
                    <div class="col-lg-3 col-12 ms-auto">
                        <h6 class="mb-3">Password</h6>
                        <div class="d-flex justify-content-between">
                        <span class="mb-2 text-sm">
                            {{$student->password}}
                        </span> 
                        </div>
                        </div>
    
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection