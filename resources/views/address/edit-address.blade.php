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
        <div>   
            <h2 class="ml-3 mt-4 mb-3">Address</h2>
            <div class="col-md-6 col-sm-12">
                <p><span> Please fill the form to process your membership with AWCCI </span></p>
                
            </div>
            <form action="/edit-address" method="post" >
                @csrf
                
              <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        @foreach($member_address as $add)

                        <input type="hidden" name="addressID" value="{{$add['addressID']}}">
                        <input type="hidden" name="memberID" value="{{$add['memberID']}}">
                        <label for="countryID">Country</label>
                        <select name="countryID" class="form-control">
                            @foreach ($country_decode as $address)
                            <option value="{{$address['countryID']}}" selected>
                                  {{$address['countryName']}}
                            </option>
                             @endforeach
                             @foreach($country as $count)
                            <option value="{{$count['countryID']}}">{{$count['countryName']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="provinceID">Province</label>
                        <select name="provinceID" class="form-control">
                            @foreach ($province_decode as $Province)
                                <option selected value="{{$Province['provinceID']}}">{{$Province['provinceName']}}</option>
                            @endforeach
                            @foreach ($province as $pro)
                                <option  value="{{$pro['provinceID']}}" >{{$pro['provinceName']}}</option>
                            @endforeach
                        </select>                      
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="districtID">District</label>
                        <select name="districtID" class="form-control">
                            @foreach ($district_decode as $dis)
                                <option selected value="{{$dis['districtID']}}" >{{$dis['districtName']}}</option>
                            @endforeach
                            @foreach ($district as $item)
                                <option value="{{$item['districtID']}}">{{$item['districtName']}}</option>
                            @endforeach    
                            
                        </select>                      
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="street">Street:</label>
                        <input type="text" class="form-control" 
                            name="street" value="{{$add['street']}}" >
                    </div>
                    <div class="btn-group mb-4 col-sm-12">
                        <button type="submit" class="custom-btn mt-3">Save</button>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>           
@endsection

@section('script')

@endsection
