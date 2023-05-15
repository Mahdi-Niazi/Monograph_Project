@extends('main')

@section('title','Add Employee')
@section('style')

@endsection


@section('content')
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="fa-solid fa-check"></i> {{session('success')}}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 bg-white rounded mb-3">
        <div class="backbtn">
                <a href="{{ url()->previous() }}" class="nav-a"> <i class="fa-solid fa-arrow-left-long"></i> Back</a>
        </div>
    </div>
</div>
    <div class="row">
        <div class="box-shadow col-lg-12 col-sm-12 col"> 
            <div>
                <h2 class="ml-3 mt-3">Add Employee</h2>
            </div>
            <form action="" method="post" id="employee" enctype="multipart/form-data">
                @csrf
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empName">Employee Name: </label>
                        <input type="text" class="form-control" placeholder="Employee Name"
                                name="empName">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empPosition">Employee Position: </label>
                        <input type="text" class="form-control" placeholder="Employee Position"
                                name="empPosition">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empEmail">Employee Email: </label>
                        <input type="email" class="form-control" placeholder="Employee Email"
                                name="empEmail">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empPhoneNumber">Employee Phone Number: </label>
                        <input type="tel" class="form-control" placeholder="Employee Phone Number"
                                name="empPhoneNumber">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empPhoto">Employee Photo: </label>
                        <input type="file" class="form-control"
                                name="empPhoto">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="empJoinDate">Employee Hired Date: </label>
                        <input type="date" class="form-control"
                                name="empJoinDate">
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="empCardNumber">Employee ID Number: </label>
                        <input type="text" class="form-control" 
                                name="empCardNumber">
                    </div>
                    <button type="submit" class="custom-btn mt-3">Save</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('script')

@endsection
