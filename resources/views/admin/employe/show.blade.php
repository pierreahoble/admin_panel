@extends('layouts.base')


@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Show employee</h1>
    <a href="{{ url('employees') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> List Of Employees</a>
</div>


<div class="row">


    <div class="col-lg-12">

        <!-- Default Card Example -->
        <div class="card mb-4">
            <div class="card-header">
                {{$employee->name}}
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">Name employee : {{ $employee->name}}</li>
                            <li class="list-group-item">Last Name employee : {{ $employee->last_name }}</li>
                            <li class="list-group-item">Email employee : {{ $employee->email }}</li>
                            <li class="list-group-item">Phone Number : {{ $employee->phone }}</li>
                            <li class="list-group-item">Company Name : {{ $employee->companies->name }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>











</div>

@endsection