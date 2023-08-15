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
                                    <img src="{{ asset('uploads/' . $student->file) }}" class="avatar avatar-xxl me-3"
                                        alt="product image">
                                </div>
                                <div>
                                    <h6 class="text-lg mb-0 mt-2">{{ $student->name }}</h6>
                                    <p class="text-sm mb-3">{{ $student->email }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="m-5 mt-sm-n6 row mt-lg-4">
                        <div class="col-lg-3 col-12 ms-auto">
                            <h6 class="mb-3">Program </h6>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    {{ $student->dob }}
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 ms-auto">
                            <h6 class="mb-3">Phone Number</h6>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    {{ $student->phone_number }}
                                </span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12 ms-auto">
                            <h6 class="mb-3">Qualification</h6>
                            <div class="d-flex justify-content-between">
                                <span class="mb-2 text-sm">
                                    {{ $student->qualification }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($Assignments && auth()->user()->role == 'teacher')
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div
                                    class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                                    <h6 class="text-white text-capitalize ps-3">Assignment Errors</h6>

                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Assignment</th>


                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($Assignments as $Assignment)
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ $Assignment->name }}</span>
                                                    </td>





                                                    <td class="align-middle d-flex justify-content-center">
                                                        <a href="{{ route('student_error',['id'=>$student->id,'assignment_id'=>$Assignment->id]) }}"
                                                            style="margin-left: 5px;" class="btn btn-outline-primary btn-sm"
                                                            data-toggle="tooltip" data-original-title="Show user">
                                                            Show lines
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>

                                </div>

                                <div class="text-center">
                                    {{ $Assignments->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
