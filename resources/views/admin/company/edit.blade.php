@extends('layouts.base')



@section('content')


<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Edit Company</h1>
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
                <form action="{{ url('company/update',[$company->id]) }}" method="post" enctype="multipart/form-data">

                    {{-- <input type="hidden" name="id" value="{{ $company->id }}"> --}}
                    @csrf

                    <div class="col-md-12 mb-2">
                        <label for=""> Name Company :</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}"  >
                        @error('name')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Email Company</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $company->email }}" >
                        @error('email')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Web Site Company</label>
                        <input type="url" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $company->website }}" >
                        @error('website')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-2">
                        <label for="">Chose Logo of Company</label>
                        <input type="file" class="form-control" name="logo" accept=".png,.jpg" value="{{ $company->logo }}">
                        {{-- @error('logo')
                        <p style="color: red">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="col-md-6 mt-4 ">
                        <button class="btn btn-primary ">Update </button>
                    </div>


                </form>
            </div>
        </div>
    </div>

</div>
    
@endsection