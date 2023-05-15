@extends('main')

@section('title','Education')
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
            <h2 class="ml-3 mt-4 mb-3">Education</h2>
            <div class="col-md-6">
                <p><span> Please fill the form to process your membership with AWCCI </span></p>
            </div>
            <form action="/edit-education" method="post" id="education">
                @csrf
                @foreach($edu as $item)
                <input type="hidden" name="memberID" value="{{$item['memberID']}}">
                <input type="hidden" name="educationID" value="{{$item['educationID']}}">
                @endforeach
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="educationLevel">Education Level:</label>
                        <select name="educationLevel" class="form-control">
                            <option selected value="{{$item['educationLevel']}}">{{$item['educationLevel']}}</option>
                            <option value="PhD">PhD</option>
                            <option value="Master">Master</option>
                            <option value="Bachelor">Bachelor</option>
                            <option value="Associated Degree">Associated Degree(14)</option>
                            <option value="High School">High School</option>
                            <option value="Secondary School">Secondary School</option>
                            <option value="Uneducated">Uneducated</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 col-sm-12">
                        <label for="educatinField">Education Field:</label>
                        <input type="text" name="educationField"class="form-control" placeholder="Computer Science" value="{{$item['educationField']}}">
                    </div>
                
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
