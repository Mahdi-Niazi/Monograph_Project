@extends('main')

@section('title','View Users')
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
                <h2 class="mr-auto">View Users</h2>
                <a href="{{URL::TO('register')}}" class="custom-btn">
                <i class="fa-solid fa-plus"></i> Add New</a>
            </div>
            <div class="table table-responsive mt-3">
                <table id="myTable" class="table-striped">
                    <thead>
                        <tr>
                            <th>ID: </th>
                            <th>Employee Name:</th>
                            <th>Username:</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($user as $item) 
                        <tr>
                            <td>{{$item['userID']}}</td>
                            <td>{{$item['name']}}</td>
                            <td>{{$item['username']}}</td>
                            <td>@if($item['role']== '0') Admin @elseif($item['role']== '1') Director @elseif($item['role']== '2') Clerk @elseif($item['role']== '3') Finance @endif</td>
                            <td>{{$item['created_at']}}</td>
                            <td>
                                <a href={{'edit-user/'.$item['userID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                                <a href={{'delete-user/'.$item['userID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
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
