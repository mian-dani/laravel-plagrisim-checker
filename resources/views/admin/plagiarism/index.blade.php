@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div
                        class="bg-gradient-primary border-radius-lg d-flex justify-content-between pb-3 pt-4 shadow-primary">
                        <h6 class="text-white text-capitalize ps-3">plagiarisms List</h6>

                        <a href="{{ route('plagiarism.create') }}" type="button" class="btn btn-success m-2">Check
                            plagiarism</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{ route('plagiarism.index') }}" method="get">

                        @csrf
                        @method('GET')
                        <div class="col-md-12 px-5 pb-2">
                            <label class="form-label">Select Assignment</label>
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
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Student Roll No.</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Assignment</th>

                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Plagiarism</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Performance</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Students</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Match Lines</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            @if ($plagiarisms)
                                <tbody>
                                    @foreach ($plagiarisms as $plagiarism)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $plagiarism->user->roll_no }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $plagiarism->assignment->name }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="{{ $plagiarism->plagiarism > 0 ? 'badge rounded-pill bg-danger' : 'badge rounded-pill bg-success' }} ">{{ $plagiarism->plagiarism }}%</span>

                                            </td>
                                            <td class="align-middle text-center">
                                                @if ($plagiarism->performance == 100)
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span
                                                            class="me-2 text-xs font-weight-bold">{{ $plagiarism->performance }}%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-gradient-success"
                                                                    role="progressbar" aria-valuenow="100" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width: {{ $plagiarism->performance }}%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($plagiarism->performance >= 75)
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span
                                                            class="me-2 text-xs font-weight-bold">{{ $plagiarism->performance }}%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-gradient-info"
                                                                    role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:{{ $plagiarism->performance }}%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($plagiarism->performance >= 50 && $plagiarism->performance <= 75)
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span
                                                            class="me-2 text-xs font-weight-bold">{{ $plagiarism->performance }}%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-gradient-warning"
                                                                    role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:{{ $plagiarism->performance }}%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <span
                                                            class="me-2 text-xs font-weight-bold">{{ $plagiarism->performance }}%</span>
                                                        <div>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-gradient-danger"
                                                                    role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                                    aria-valuemax="100"
                                                                    style="width:{{ $plagiarism->performance }}%;"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $plagiarism->match_user_id }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ count(unserialize($plagiarism->matchLines)) }}</span>
                                            </td>
                                            <td class="align-middle d-flex justify-content-center">
                                                <a href="{{ route('plagiarism.show', $plagiarism->id) }}"
                                                    style="margin-left: 5px;"
                                                    class="btn btn-outline-primary btn-sm {{ count(unserialize($plagiarism->matchLines)) > 0 ? '' : 'disabled' }}"
                                                    data-toggle="tooltip" data-original-title="Show user">
                                                    Show lines
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                        <div class="text-center">
                            {{ $plagiarisms->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
