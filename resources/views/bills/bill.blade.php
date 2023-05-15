@extends('main')

@section('title','Invoice')
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
            <div class="box-shadow p-4 overflow">
                <div class="bill-detial">
                    <div class="d-flex"> 
                        <div class="col-md-6 col-sm-12">
                            <img src="{{URL::TO('images/AWCCI_logo.png')}}" class="mt-3 mb-3" alt="" width="150px" height="150px">
                            <p>
                                <br>Koloa Poshta Burj Shahr Ara  
                                <br>Kabul, Afghanistan
                                <br>P:+93 700 300 400
                                <br>E: finance@awcci-global.org
                                <br>WEB: http://awcci-global.org
                                <br>Bill To:
                                @foreach($member as $item)
                                <br><b>{{$item['businessName']}}</b>
                                <br>{{$item['businessPhoneNumber']}}
                                <br>{{$item['businessEmail']}}
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-6 col-sm-12 invoice">
                            @if($item['paid'] == '1') 
                                <div class="paid-box"><h1>Paid</h1></div>
                            @else 
                                 <div class="unpaid-box"><h1>Unpaid</h1></div>
                            @endif
                            @foreach($member as $item)  
                                <h3><b>Invoice# {{$item['billID']+1000}}</b></h3>                                
                                <p>
                                    <br>Invoice Date:&nbsp; &nbsp; &nbsp;{{$item['paidDate']}}
                                    <br>Due Date:&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;{{$date}}
                                    <br>Amount Due:&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$item['amount']}}
                                </p>
                            @endforeach
                        </div> 
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="table-responsive">
                            <table id="customers">
                                <thead>
                                    <tr>
                                        <th>item</th>
                                        <th>Description</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                                                                    
                                    </tr>
                                </thead>
                                <tbody>                                   
                                    <tr>
                                        @foreach($member as $item)
                                        <td>{{$item['membershipName']}}</td>
                                        <td>Description of Membership</td>
                                        <td>1</td>
                                        <td>{{$item['amount']}}</td>
                                        <td>{{$item['amount']}}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 float-right ">
                        <div class="mt-5 mb-5">
                            <table class="tsubtotal">
                                @foreach($member as $item)
                                <tr>
                                    <th>Subtotal:</th>
                                    <td>{{$item['amount']}}</td>
                                </tr>
                                <tr>  
                                    <th>Total:</th>
                                    <td>{{$item['amount']}}</td>
                                </tr>    
                                <tr>
                                    <th>Paid:</th>
                                    <td>@if($item['paid'] == '1') {{'Yes'}} @else {{'No'}} @endif</td>
                                </tr>
                                <tr>    
                                    <th><strong>Balance:</strong></th>
                                    <td><strong>{{$item['amount']}}</strong></td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 float-left">
                            <p><strong>Terms</strong>
                            <br>AWCCI Bank Account Information:
                            <br>===============================================
                            <br>Bank Name : Azizi Bank
                            <br>Beneficiary Name : Afghanistan Women's Chamber of Commerce and Industry
                            <br>Account Number : 00010 120 9597 445/ USD
                            <br>Account Number : 00010 110 9597 390/ AFN
                            <br>===============================================</p>
                    </div>
                </div>    
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
