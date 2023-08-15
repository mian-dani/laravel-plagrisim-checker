@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ auth()->user()->role == "teacher" ? "Total Students" : "Attempted Assignment"}}</p>
                            <h4 class="mb-0">{{
                            $userCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                            </span>Working...</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Assignment</p>
                            <h4 class="mb-0">{{ $assignmentCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                            yesterday</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">weekend</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">{{ auth()->user()->role == "teacher" ? "Total Results" : "UnAttempted Assignment" }}</p>
                            <h4 class="mb-0">{{ $plagiarismCount }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        @if (auth()->user()->role == 'teacher')
        <div class="col-lg-4 col-md-6 mt-4 mb-4">
            <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Assignment Errors</h6>
                    <p class="text-sm ">Total Errors in different Assignments</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">


                    </div>
                </div>
            </div>

        </div>
        @endif
        @if (auth()->user()->role == 'teacher')
        <div class="col-lg-8 col-md-6 mt-4 mb-4">
            <div class="row">

                <form action="{{ route('showError') }}" method="get">

                    @csrf
                    @method('GET')
                    <div class="col-md-12 px-5 pb-2">
                        <label class="form-label">Select Assignment to see Errors:</label>
                        <div class="input-group input-group-outline ">

                            <select class="form-select form-control" onchange="this.form.submit()" name="assignment_id"
                                aria-label="Default select example">
                                <option selected disabled>Select Assignment</option>
                                @foreach ($assignments as $assignment)
                                    <option value="{{ $assignment->id }}">{{ $assignment->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <div class="col-lg-4 mt-4 mb-3">
            {{-- <div class="card z-index-2 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                    <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                        <div class="chart">
                            <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="mb-0 ">Completed Tasks</h6>
                    <p class="text-sm ">Last Campaign Performance</p>
                    <hr class="dark horizontal">
                    <div class="d-flex ">
                        <i class="material-icons text-sm my-auto me-1">schedule</i>
                        <p class="mb-0 text-sm">just updated</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
