@extends('main')

@section('title','Register User')
@section('style')

@endsection


@section('content')
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
                <h2 class="ml-3 mt-3">Edit User</h2>
            </div>
            <form action="/edit-user" method="post" id="editUser">
                @csrf
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        @foreach ($user as $item)
                         <input type="hidden" name="empID" value="{{$item['empID']}}">
                         <input type="hidden" name="userID" value="{{$item['userID']}}">   
                        <label for="name">Employee Name: </label>
                        <input type="text" name="name" class="form-control" value="{{$item['name']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="username">Username: </label>
                        <input type="text" class="form-control" placeholder="Employee Position"
                                name="username" value="{{$item['username']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password">New Password : </label>
                        <input type="password" class="form-control" placeholder="Employee Email"
                                name="password" id="password">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="confirmPassword">Confirm Password: </label>
                        <input type="password" class="form-control" placeholder="Employee Phone Number"
                                name="confirmPassword" >
                                    @error('confirmPassword')
                                        <span class="error-msg"> {{$message}} </span>
                                    @enderror
                    </div>
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="role">Role: </label>
                        <select name="role" class="form-control">
                            <option selected value="{{$item['role']}}">@if($item['role']== '0') Admin @elseif($item['role']== '1') Director @elseif($item['role']== '2') Clerk @endif</option>
                            <option value="0">Admin</option>
                            <option value="1">Director</option>
                            <option value="2">Clerk</option>
                        </select>
                    </div>
                     @endforeach
                    <button type="submit" class="custom-btn mt-3">Update</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('script')

@endsection
