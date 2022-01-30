@extends('layouts.base')



@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"> Create New Employees</h1>
    <a href="{{ url('employees') }}" class="d-none d-sm-inline-block btn btn-primary shadow-sm"> List of Employe</a>
</div>



<div class="col-lg-12">

    <!-- Default Card Example -->
    <div class="card mb-4">
        <div class="card-header">
            Fill in the fields
        </div>
        <div class="card-body">
            <form action="{{ url('empolyee/store') }}" method="post" enctype="multipart/form-data">


                @csrf

                <div class="col-md-12 mb-2">
                    <label for=""> Name Empolyee :</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                    {{-- @error('name')
                    <p style="color: red">{{ $message }}</p>
                    @enderror --}}
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Email Empolyee</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}">
                    @error('email')
                    <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Last Name Employe</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('website') }}" required>
                    @error('last_name')
                    <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>


                <div class="col-md-12 mb-2">
                    <label for="">Phone Employe</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('website') }}" required>
                    @error('phone')
                    <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-12 mb-2">
                    <label for="">Choose Company of Empolyee</label>
                    <select name="company" class="form-control" required>
                        <option value="">Choose Company </option>
                        @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }} </option>
                        @endforeach
                    </select>
                    @error('company')
                    <p style="color: red">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-md-6 mt-4 ">
                    <button class="btn btn-primary ">Save </button>
                </div>


            </form>
        </div>
    </div>
</div>




    
@endsection