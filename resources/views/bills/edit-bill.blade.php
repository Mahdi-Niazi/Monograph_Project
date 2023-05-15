@extends('main')

@section('title','Edit Bills')
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
                <h2 class="ml-3 mt-3">Membership Bill </h2>
                <form action="/edit-bill" method="post">
                    @csrf
                   @foreach($bill as $item) 
                    <div class="form-row mr-2 ml-2 mt-2 mb-4">
                        <div class="form-group col-md-6 col-sm-12">
                            <input type="hidden" name="memberID" value="{{$item['memberID']}}">
                            <input type="hidden" name="businessID" value="{{$item['businessID']}}">
                            <input type="hidden" name="billID" value="{{$item['billID']}}">
                            <label for="memberID">Member Name:</label>
                            <select name="memberID" class="form-control">
                               <option selected value="{{$item['memberID']}}">{{$item['firstName']}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="businessID">Membership Type:</label>
                            <select name="businessID" class="form-control">
                                <option selected value="{{$item['businessID']}}">{{$item['businessName']}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="paid">Paid:</label>
                            <select name="paid" class="form-control">
                                
                                <option value="{{$item['paid']}}" selected>@if($item['paid'] == 0)  {{'No'}} @else {{'Yes'}} @endif</option>
                                
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="paidDate">Paid Date:</label>
                            <input type="date" name="paidDate" class="form-control" value="{{$item['paidDate']}}">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="registerDate">Register Date:</label>
                            <input type="date" name="registerDate" class="form-control" value="{{$item['registerDate']}}">
                        </div>
                        
                        <button type="submit" class="custom-btn mt-3">Save</button>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
