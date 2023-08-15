@extends('layouts.admin')
<style>
    .plagiarism_color {
        color: #842029;
    }

    .plagiarism_container {
        color: #842029;
        background-color: #f8d7da !important;
        border-color: #f5c2c7 !important;
    }

    ul.list-group .plagiarism_container {
        margin: 3px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header pb-0 px-3">
                                <h6 class="mb-0">Match Lines</h6>
                            </div>
                            <div class="card-body ">
                                <ul class="list-group">
                                    @foreach ($bugs as $plagiarisms)
                                        <li class="list-group-item  plagiarism_container d-flex   border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <h6 class="plagiarism_color text-sm">{{ $plagiarisms }}</h6>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
