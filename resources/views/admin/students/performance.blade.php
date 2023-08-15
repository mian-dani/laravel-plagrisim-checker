@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                        <h6 class="text-white text-capitalize ps-3">Assignment List</h6>
                        {{-- <a href="{{route('teacher.create')}}" type="button" class="btn btn-success m-2 fa fa-plus ">Add New</a> --}}

                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary  text-xxs font-weight-bolder opacity-7">
                                        Assignment</th>

                                    <th
                                        class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                        Errors
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            @if ($bugs)
                                <tbody>
                                    @foreach ($bugs as $bug)
                                        <tr>
                                            <td class="align-middle text-center ">
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $bug->assignment->name }}</h6>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="align-middle text-center">
                                                <span
                                                    class="{{ count(unserialize($bug->errors)) > 0 ? 'badge rounded-pill bg-danger' : 'badge rounded-pill bg-success' }} ">{{ count(unserialize($bug->errors)) }}</span>

                                            </td>
                                            <td class="align-middle d-flex justify-content-center">
                                                <a href="{{ route('bug.show', $bug->id) }}" style="margin-left: 5px;"
                                                    class="btn btn-outline-primary btn-sm " data-toggle="tooltip"
                                                    data-original-title="Show user">
                                                    Show Errors
                                                </a>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
