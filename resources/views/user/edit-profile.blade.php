@extends('main')

@section('title','Edit Profile')
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
            @foreach($data as $item)
            <form action="/edit-profile" method="post" id="editProfile">
                    @csrf
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        <input name="userID" type="hidden" value="{{$item['userID']}}">
                        <label for="username">Email</label>
                        <input type="email" class="form-control" placeholder="Email Address"
                            name="username" value="{{$item['username']}}" >
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control" placeholder="New Password"
                            name="password" autocomplete="off">
                    </div>                        
                    <button type="submit" class="custom-btn mt-3">Update</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
@endsection

@section('script')

@endsection
