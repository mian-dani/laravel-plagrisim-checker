@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div
                            class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                            <h6 class="text-white text-capitalize ps-3">Add New Student</h6>
                        </div>
                    </div>
                    {{-- <div class="p-4 bg-light"> --}}
                    <form class="m-3 mb-4" action="{{ route('admin.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <select class="form-select form-control" name="student_id"
                                        aria-label="Default select example">
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->roll_no }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3">
                                    <label class="form-label">Error File</label>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-outline my-3 text-center">
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
