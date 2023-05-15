@extends('main')

@section('title','View Members')
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
                <h2 class="mr-auto">View Members</h2>
                <a href="{{URL::TO('add-member')}}" class="custom-btn">
                <i class="fa-solid fa-plus"></i> Add New</a>
            </div>
            <div class="table table-responsive mt-3">
                <table id="myTable" class="table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Business Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($member as $item)
                        <tr>
                            <td>{{$item['memberID']}}</td>
                            <td>{{$item['firstName']}}</td>
                            <td>{{$item['lastName']}}</td>
                            <td>{{$item['email']}}</td>
                            <td>{{$item['phoneNumber']}}</td>
                            <td>{{$item['businessName']}}</td>
                            <td>
                                <a href={{'show-member/'.$item['memberID']}} class="mr-2 c"><i class="fa-solid fa-eye"></i></a>
                                <a href={{'edit-member/'.$item['memberID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                                <a href={{'delete-member/'.$item['memberID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
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
