@extends('main')

@section('title','View Employee')
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
    <div class="col-lg-12 col-sm-12">
        <div class="box-shadow p-4">
            <div class="title d-flex">
                <h2 class="mr-auto">View Employee</h2>
                <a href="{{URL::TO('/add-employee')}}" class="custom-btn">
                <i class="fa-solid fa-plus"></i> Add New</a>
            </div>
            
            <div class="table table-responsive mt-3">
                <table id="myTable" class="table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID:</th>
                            <th>Employee Name:</th>
                            <th>Position:</th>
                            <th>Email:</th>
                            <th>Phone Number:</th>
                            <th>Join Date:</th>
                            <th>Card Number:</th>
                            <th>Photo:</th>
                            <th>Action:</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($emp as $item) 
                        <tr>
                            <td>{{$item['empID']}}</td>
                            <td>{{$item['empName']}}</td>
                            <td>{{$item['empPosition']}}</td>
                            <td>{{$item['empEmail']}}</td>
                            <td>{{$item['empPhoneNumber']}}</td>
                            <td>{{$item['empJoinDate']}}</td>
                            <td>{{$item['empCardNumber']}}</td>
                            <td><img src="{{ URL::asset('images/employee/'.$item->empPhoto) }}" alt="upload photo" width="50px" height="50px" class="rounded-circle"></td>
                            <td>
                                <a href={{'edit-employee/'.$item['empID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                                <a href={{'delete-employee/'.$item['empID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>                          
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>    
@endsection

@section('script')

@endsection
