@extends('main')

@section('title','Add Bill')
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
                <form action="" method="post" id="bill" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mr-2 ml-2 mt-2 mb-4">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="memberID">Member Name:</label>
                            <select name="memberID" class="form-control" id="members">
                                <option value="" selected>Choose..</option>
                                @foreach ($name as $item)
                                <option  value="{{$item['memberID']}}">{{$item['firstName']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="businessID">Business Name:</label>
                            <select name="businessID" class="form-control" id="businessName">
                               
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="paid">Paid:</label>
                            <select name="paid" class="form-control">
                                <option selected value="">Choose...</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="paidDate">Paid Date:</label>
                            <input type="date" name="paidDate" class="form-control">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="registerDate">Register Date:</label>
                            <input type="date" name="registerDate" class="form-control">
                        </div>
                        <button type="submit" class="custom-btn mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection