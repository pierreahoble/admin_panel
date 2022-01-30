@extends('layouts.base')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Show Company</h1>
    <a href="{{ url('companies') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> List Of Companies</a>
</div>


<div class="row">


    <div class="col-lg-12">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                {{$company->name}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ $company->logo }}" alt="" style="width: 90%; height: 50%;">
                    </div>

                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item">Name Company : {{ $company->name}}</li>
                            <li class="list-group-item">Email Company : {{ $company->email }}</li>
                            <li class="list-group-item">Web Site Company : {{ $company->website }}</li>
                            {{-- <li class="list-group-item">Porta ac consectetur ac</li>
                            <li class="list-group-item">Vestibulum at eros</li> --}}
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>











</div>

@endsection