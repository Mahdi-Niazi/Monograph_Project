@extends('main')

@section('title','Address')
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
    <div class="col-lg-12 col-sm-12">
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fa-solid fa-check"></i> {{session('success')}}
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="box-shadow col-lg-12 col-sm-12 col">  
            <h2 class="ml-3 mt-4 mb-3">Address</h2>
            <div class="col-md-6">
                <p><span> Please fill the form to process your membership with AWCCI </span></p>
                
            </div>
            <form action="" method="post" id="address">
                @csrf
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        @foreach($member as $item)
                        <input type="hidden" name="memberID" value="{{$item['memberID']}}">
                        @endforeach
                        <label for="countryID">Country</label>
                        <select name="countryID" class="form-control" id="country">
                            <option value="" selected>Choose..</option>
                            @foreach ($country as $item)
                                <option value="{{$item['countryID']}}">{{$item['countryName']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="provinceID">Province</label>
                        <select name="provinceID" class="form-control" id="province">
                               
                        </select>                      
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="districtID">District</label>
                        <select name="districtID" class="form-control" id="district">
                               
                        </select>                      
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" placeholder="Enter Street"
                            name="street" >
                    </div>
                    <div class="btn-group mb-4 col-sm-12">
                        <button type="submit" class="custom-btn mt-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>           
@endsection

@section('script')

@endsection
