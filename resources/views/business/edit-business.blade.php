@extends('main')

@section('title','Edit Business')
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
        <h2 class="ml-3 mt-3">Business Information</h2>
       
        <form action="/edit-business" method="post" enctype="multipart/form-data" id="business">
            @csrf
             @foreach($business as $item)
            <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <input type="hidden" class="form-control" name="memberID" value="{{$item['memberID']}}">
                    <input type="hidden" name="businessID" value="{{$item['businessID']}}">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="businessName">Business Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Business Name"
                        name="businessName" value="{{$item['businessName']}}">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="businessEmail">Business Email:</label>
                    <input type="email" class="form-control"  placeholder="someone@mail.com"
                        name="businessEmail" value="{{$item['businessEmail']}}">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="businessPhoneNumber">Business Phone Number:</label>
                    <input type="tel" class="form-control" placeholder="07XXXXXXXX"
                        name="businessPhoneNumber" value="{{$item['businessPhoneNumber']}}">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="businessLogo">Business Logo:</label>
                    <input type="file" class="form-control" 
                        name="businessLogo" value="{{$item['businessLogo']}}">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="startingDate">Starting Date Business:</label>
                    <input type="date" name="startingDate"  class="form-control" value="{{$item['startingDate']}}">
                </div>
                <div class="form-group col-md-12 col-sm-12">
                    <label for="businessWebsite">Business Website:</label>
                    <input type="text" name="businessWebsite" placeholder="www.example.com" class="form-control" value="{{$item['businessWebsite']}}">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="startingCapital">Starting Capital:</label>
                    <input type="text" name="startingCapital" placeholder="Enter Starting Capital" class="form-control" value="{{$item['startingCapital']}}">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="startingCapitalCurrency">Currency:</label>
                    <select name="startingCapitalCurrency" class="form-control">
                        <option selected value="{{$item['startingCapitalCurrency']}}">{{$item['startingCapitalCurrency']}}</option>
                        <option value="AFN">AFN</option>
                        <option value="USD">USD</option>
                        <option value="EURO">EURO</option>
                        <option value="Rupee PK">Rupee PK</option>
                        <option value="Rupee India">Rupee India</option>
                    </select>
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="annualRevenue">Annual Revenue:</label>
                    <input type="text" name="annualRevenue" placeholder="Enter Annual Revenue" class="form-control" value="{{$item['annualRevenue']}}">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="annualRevenueCurrency">Currency:</label>
                    <select name="annualRevenueCurrency" class="form-control">
                        <option selected value="{{$item['annualRevenueCurrency']}}">{{$item['annualRevenueCurrency']}}</option>
                        <option value="AFN">AFN</option>
                        <option value="USD">USD</option>
                        <option value="EURO">EURO</option>
                        <option value="Rupee PK">Rupee PK</option>
                        <option value="Rupee India">Rupee India</option>
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="sectorsID">Business Sector:</label>
                    <select name="sectorsID" class="form-control">
                        @foreach($sector as $sec)
                        <option selected value="{{$sec['sectorsID']}}">{{$sec['sectorName']}}</option>
                        @endforeach
                       
                    </select>
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="femaleEmp">Number of Female Employee:</label>
                    <input type="number" class="form-control" name="femaleEmp" value="{{$item['femaleEmp']}}">
                </div>
                <div class="form-group col-md-4 col-sm-12">
                    <label for="maleEmp">Number of Male Employee:</label>
                    <input type="number" class="form-control" name="maleEmp" value="{{$item['maleEmp']}}">
                </div>
                @endforeach
                
                <div class="btn-group mb-4 col-sm-12">
                    <button type="submit" class="custom-btn mt-3 ml-3">Update</button>
                </div>
            </div>
        </form>
        
    </div>    
</div>    
@endsection

@section('script')

@endsection