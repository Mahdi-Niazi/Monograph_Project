@extends('main')
@foreach($member as $item)
@section('title',$item['firstName'])
@endforeach
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
<!-- Member Section -->
<div class="row">
    @foreach($member as $item)
    <div class="col-lg-12 col-sm-12">
        <div class="box-shadow m-4">
            <h1 class="p-4">Personal Information</h1>
            <div class="m-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <img src="{{ URL::asset('images/members/'.$item->profilePicture) }}" alt="Profile Picture" class="rounded img-fluid ">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3>{{$item['firstName']}} {{$item['lastName']}}</h3> 
                        @foreach($business as $bus)
                        <p>{{$item['position']}} of {{$bus['businessName']}}</p>
                    @endforeach
                    </div>  
                </div>
            </div>
            <div class="m-5">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 p-4">
                        <div class="table-responsive">
                            <table class="member-detial">
                                <tr>
                                    <th>Phone Number: </th>
                                    <td>{{$item['phoneNumber']}}</td>
                                </tr>
                                <tr>  
                                    <th>Date of Birth: </th>
                                    <td>{{$item['dob']}}</td>
                                </tr>    
                                <tr>
                                    <th>NIC:</th>
                                    <td>{{$item['nic']}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$item['email']}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 p-4">
                    <div class="table-responsive ml-6">
                            <table class="member-detial">
                                <tr>
                                    <th>Gender: </th>
                                    <td>@if($item['gender'] == '0') {{'Male'}} @else {{'Female'}} @endif</td>
                                </tr>
                                <tr>  
                                    <th>Nationality: </th>
                                    <td>{{$item['nationality']}}</td>
                                </tr>    
                                <tr>
                                    <th>Mother Language:</th>
                                    <td>{{$item['motherLang']}}</td>
                                </tr>
                                <tr>
                                    <th>Created At:</th>
                                    <td>{{$item['created_at']}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-5 pb-4">    
                <div class="row">
                    <div class="col-lg-12 col-sm-12 p-4 action-member">
                        <a href={{'/edit-member/'.$item['memberID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    @endforeach
</div>
<!-- End of Member Section -->


<!-- Business Section -->
<div class="row">
    @foreach($business as $business)
    <div class="col-lg-12 col-sm-12">
        <div class="box-shadow m-4">
            <h1 class="p-4">Business Information</h1>
            <div class="m-5">
                <div class="row">
                    <div class="col-md-6 col-sm-12 ">
                        <img src="{{ URL::asset('images/businesses/'.$business->businessLogo) }}" alt="Business Logo" class="rounded img-fluid">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h3>Business Name</h3>
                        <p> {{$business['businessName']}}</p>
                    </div>  
                </div>
            </div>
            <div class="m-5">    
                <div class="row">
                    <div class="col-lg-6 col-sm-12 p-4">
                        <div class="table-responsive">
                            <table class="member-detial">
                                <tr>  
                                    <th>Business Email: </th>
                                    <td>{{$business['businessEmail']}}</td>
                                </tr>    
                                <tr>
                                    <th>Business Phone Number:</th>
                                    <td>{{$business['businessPhoneNumber']}}</td>
                                </tr>
                                <tr>
                                    <th>Business Website:</th>
                                    <td>{{$business['businessWebsite']}}</td>
                                </tr>
                                <tr>
                                    <th>Starting Date:</th>
                                    <td>{{$business['startingDate']}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>  
                    <div class="col-lg-6 col-sm-12 p-4">
                        <div class="table-responsive">
                            <table class="member-detial">
                                <tr>
                                    <th>Starting Capital: </th>
                                    <td>{{$business['startingCapital']}} {{$business['startingCapitalCurrency']}}</td>
                                </tr>
                                <tr>  
                                    <th>Annual Revenue: </th>
                                    <td>{{$business['annualRevenue']}} {{$business['annualRevenueCurrency']}}</td>
                                </tr>    
                                <tr>
                                    <th>Male Employee:</th>
                                    <td>{{$business['maleEmp']}}</td>
                                </tr>
                                <tr>
                                    <th>Female Employee:</th>
                                    <td>{{$business['femaleEmp']}}</td>
                                </tr>
                                <tr>
                                    @foreach ($sector as $list)
                                    
                                    <th>Sector:</th>
                                    <td>{{$list['sectorName']}}</td>
                                    @endforeach
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-5 pb-4">
                <div class="row">
                    <div class="col-lg-12 col-sm-12 p-4 action-member">
                        <a href={{'/edit-business/'.$business['businessID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                    </div>
                </div>  
            </div>         
        </div>
    </div>
    @endforeach
</div>
<!-- End of Business Section -->

<!-- Country  and Education Section -->
    <div class="row">
        @foreach($country as $address)
        <div class="col-lg-6 col-sm-12">
            <div class="box-shadow m-4">
                <h1 class="p-4">Address Information</h1>
                <div class="m-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 p-4">
                            <div class="table-responsive">
                                <table class="member-detial">
                                    <tr>
                                        <th>Country: </th>
                                        <td>{{$address['countryName']}}</td>
                                    </tr>
                                    <tr>  
                                        <th>Province: </th>
                                        <td>{{$address['provinceName']}}</td>
                                    </tr>    
                                    <tr>  
                                        <th>District: </th>
                                        <td>{{$address['districtName']}}</td>
                                    </tr>    
                                    <tr>
                                        <th>Street:</th>
                                        <td>{{$address['street']}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="m-5 pb-4">     
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 p-4 action-member">
                            <a href={{'/edit-address/'.$address['addressID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                        </div>
                    </div>  
                </div>                
            </div>
        </div>
        @endforeach
        @foreach($education as $edu)
        <div class="col-lg-6 col-sm-12">
            <div class="box-shadow m-4">
                <h1 class="p-4">Education Information</h1>
                <div class="m-5">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 p-4">
                            <div class="table-responsive">
                                <table class="member-detial">
                                    <tr>
                                        <th>Education Level: </th>
                                        <td>{{$edu['educationLevel']}}</td>
                                    </tr>
                                    <tr>  
                                        <th>Field: </th>
                                        <td>{{$edu['educationField']}}</td>
                                    </tr>    
                                </table>
                                <br>
                                <br>
                                <br>
                            </div>
                        </div>  
                    </div> 
                </div>
                <div class="m-5 pb-4">    
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 p-4 action-member">
                            <a href={{'/edit-education/'.$edu['educationID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>    
        @endforeach
    </div>
<!-- end of Country and Education section -->



<!-- Event and Membership Section -->
<div class="row">
    @foreach($membership as $fee)
    <div class="col-lg-6 col-sm-12">     
        <div class="box-shadow m-4">
            <h1 class="p-4">Membership Information</h1>
            <div class="m-5">
                <div class="row">
                    <div class="col-md-12 col-sm-12 p-4">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="member-detial">
                                    <tr>
                                        <th>Membership Type: </th>
                                        <td>{{$fee['membershipName']}}</td>
                                    </tr>
                                    <tr>  
                                        <th>Membership Fee: </th>
                                        <td>{{$fee['amount']}}</td>
                                    </tr>    
                                    <tr>
                                        <th>Paid:</th>
                                        <td>
                                            @if($fee['paid'] == '1')
                                                {{'Yes'}}
                                            @else
                                                {{'No'}}
                                            @endif        
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Paid Date:</th>
                                        <td>{{$fee['paidDate']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Registered Date:</th>
                                        <td>{{$fee['registerDate']}}</td>
                                    </tr>
                                    <tr>
                                        <th>Need For Update:</th>
                                        <td>{{$msg}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>  
                </div> 
            </div>         
        </div>
    </div>
    @endforeach  
</div>
<!-- end of Event and Membership Section -->
@endsection

@section('script')

@endsection
