@extends('main')

@section('title','Edit Member')
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
            <h2 class="ml-3 mt-4 mb-3">Personal Information</h2>
            <form action="/edit-member" method="post">
                @csrf
                @foreach($data as $item)
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        <input type="hidden" name="memberID" value="{{$item['memberID']}}">
                        <label for="firstName">First Name:</label>
                        <input type="text" class="form-control" placeholder="Enter First Name"
                            name="firstName" value="{{$item['firstName']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="lastName">Last Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Last name"
                            name="lastName" value="{{$item['lastName']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" placeholder="someone@mail.com"
                            name="email"  value="{{$item['email']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="tel" class="form-control" placeholder="07XXXXXXXX"
                            name="phoneNumber" value="{{$item['phoneNumber']}}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="gender">Gender:</label>
                        <select name="gender" class="form-control">
                            <option selected value="{{$item['gender']}}">@if($item['gender'] == 0)  {{'Male'}} @else {{'Female'}} @endif</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="dob">Date of Birth:</label>
                        <input type="date" name="dob" class="form-control" value="{{$item['dob']}}" >
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="profilePicture">Profile Picture</label>
                        <input type="file" name="profilePicture" class="form-control" value="{{$item['profilePicture']}}">
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="nic">NIC:</label>
                        <input type="text" class="form-control" placeholder="1400-1000-****"
                            name="nic" value="{{$item['nic']}}">
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="frontNic">NIC Front Photo:</label>
                        <input type="file" name="frontNic" class="form-control" value="{{$item['frontNic']}}">
                    </div>
                    <div class="form-group col-md-3 col-sm-12">
                        <label for="backNic">NIC Back Photo:</label>
                        <input type="file" name="backNic" class="form-control" value="{{$item['backNic']}}">
                    </div>
                        <div class="form-group col-md-4 col-sm-12">
                        <label for="position">Position</label>
                        <select name="position" class="form-control">
                            <option selected>{{$item['position']}}</option>
                            <option>President</option>
                            <option>Vice President</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="nationality">Nationality:</label>
                        <input type="text" name="nationality" class="form-control"
                            placeholder="Afghan" value="{{$item['nationality']}}">
                    </div>
                    <div class="form-group col-md-4 col-sm-12">
                        <label for="motherLang">Native Language:</label>
                        <select name="motherLang" class="form-control">
                            <option selected>{{$item['motherLang']}}</option>
                            <option>Dari</option>
                            <option>Pashto</option>
                            <option>Uzbek</option>
                            <option>Turkmen</option>
                            <option>Balochi</option>
                        </select>
                    </div>
                    @endforeach
                    <div class="btn-group mb-4 col-sm-12">
                        <button type="submit" class="custom-btn mt-3">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
