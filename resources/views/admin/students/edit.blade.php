@extends('layouts.admin')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                      <h6 class="text-white text-capitalize ps-3">Update Student Profile</h6>
                    </div>
                  </div>
                  {{-- <div class="p-4 bg-light"> --}}
                    <form class="m-3 mb-4" action="{{route('student.update', $student->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="row">
                        <div class="col-md-12">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name" value="{{$student->name}}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>
                        </div>
                        {{-- <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{$student->email}}" >
                          </div>
                        </div> --}}
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control @error('qualification') is-invalid @enderror" name="qualification" placeholder="Qualification" value="{{$student->qualification}}">
                            @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email" value="{{$student->email}}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>
                        </div>
                      </div>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Program</label>
                                    <input type="text" class="form-control @error('program') is-invalid @enderror"
                                        name="program" value="{{$student->dob}}">
                                    @error('program')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Phone Number" value="{{$student->phone_number}}">
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                            <img src="{{asset('uploads/'.$student->file )}}" class="avatar avatar-sm me-3 border-radius-lg" alt="user3">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <button type="submit" class="btn btn-primary m-2">Save</button>

                          </div>
                        </div>
                      </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
