@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                            <h6 class="text-white text-capitalize ps-3">Update Assignment</h6>
                        </div>
                    </div>
                    {{-- @dd($student->id) --}}
                    {{-- <div class="p-4 bg-light"> --}}
                    <form class="m-3 mb-4" action="{{ route('assignment_update', $assignment->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ $assignment->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12 text-center">
                            <div class="input-group input-group-outline my-3 text-center">
                                <label class="form-label"></label>
                                <button type="submit" class="btn btn-primary m-2">Update</button>

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
