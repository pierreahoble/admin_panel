@extends('layouts.base')



@section('content')



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Companies</h1>
    <a href="{{ url('company/create') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> Add New Company</a>
</div>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List Of Companies</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Name Company</th>
                        <th>Email Comapny</th>
                        {{-- <th>Web Site Company</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                    <tr>
                        <td>
                            <img src="{{ $company->logo }}" alt="" style="width: 50%; border-radius: 15%">
                        </td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}k</td>
                        {{-- <td><a href="{{ url($company->website) }}" target="_blank"> {{ Str::limit($company->website,30,'...') }}</a> </td> --}}
                        <td>
                            <a href="{{ url('company/show',[Crypt::encrypt($company->id)]) }}" class="btn btn-info btn-circle btn-sm" title="delete company">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ url('company/edit',[Crypt::encrypt($company->id)]) }}" class="btn btn-primary btn-circle btn-sm" title="delete company">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ url('company/delete',[Crypt::encrypt($company->id)]) }}" class="btn btn-danger btn-circle btn-sm" title="delete company">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div  class="col-md-12 d-flex justify-content-center">
                {{ $companies->links() }}
            </div>
        </div>
    </div>
</div>


{{-- <select class="form-control" name="zone_id" id="zone_id" required>
    @foreach($zones as $zone)
    <option value="{{$zone->id}}"

        @if($zone->id==old('zone_id')) selected="" 
        @else
            @isset($item)
            @if($zone->id==$item->zone_id) selected="" @endif
            @endif
        @endif

        >{{$zone->nom ?? '-'}} <span style="float:right">[{{$zone->adresse}}]</span>

        
    </option>
    @endforeach
</select> --}}




@endsection