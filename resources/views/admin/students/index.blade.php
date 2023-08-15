@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                        <h6 class="text-white text-capitalize ps-3">Student List</h6>
                        <a href="{{ route('student.create') }}" type="button" class="btn btn-success m-2 fa fa-plus ">Add
                            New</a>

                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Student
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Roll No</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Phone Number</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            @if ($students)
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('uploads/'.$student->file) }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $student->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $student->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $student->roll_no }}</p>

                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $student->phone_number }}</span>
                                            </td>
                                            <td class="align-middle d-flex justify-content-center">
                                                <a href="{{ route('student.show', $student->id) }}" style="margin-left: 5px;"
                                                    class="text-secondary font-weight-bold text-xs btn btn-info text-white"
                                                    data-toggle="tooltip" data-original-title="Show user">
                                                    Show
                                                </a>
                                                <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-secondary font-weight-bold text-xs btn btn-danger text-white"
                                                        style="margin-left: 5px;" data-toggle="tooltip"
                                                        onclick="return confirm('Are You Sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        <div class="text-center">
                             {{ $students->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
