@extends('layouts.base')

@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Employees</h1>
    <a href="{{ url('employe/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> Add New Employe</a>
</div>




<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Of Employees</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name employe</th>
                        <th>Email Comapny</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employe)
                    <tr>
                        <td>{{ $employe->name }}</td>
                        <td>{{ $employe->email }}k</td>
                        {{-- <td><a href="{{ url($employe->website) }}" target="_blank"> {{ Str::limit($employe->website,30,'...') }}</a> </td> --}}
                        <td>
                            <a href="{{ url('employe/show',[Crypt::encrypt($employe->id)]) }}" class="btn btn-info btn-circle btn-sm" title="delete employe">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ url('employe/edit',[Crypt::encrypt($employe->id)]) }}" class="btn btn-primary btn-circle btn-sm" title="delete employe">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('employe/delete',[Crypt::encrypt($employe->id)]) }}" class="btn btn-danger btn-circle btn-sm" title="delete employe">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div  class="col-md-12 d-flex justify-content-center">
                {{ $employees->links() }}
            </div>
        </div>
    </div>
</div>




    
@endsection