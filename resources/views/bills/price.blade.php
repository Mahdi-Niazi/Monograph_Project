@extends('main')

@section('title','Add Bill')
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
                <h2 class="ml-3 mt-3"> Pricing </h2>
                <form action="" method="post">
                    @csrf
                    <div class="form-row mr-2 ml-2 mt-2 mb-4">
                            @foreach($bill as $item)
                                <input type="hidden" name="billID" value="{{$item['billID']}}">
                            @endforeach
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="membershipName">Membership Type: </label>
                            <select name="membershipName" class="form-control">
                                <option selected>Choose...</option>
                                <option >Economic Activiest</option>
                                <option >Advocate</option>
                                <option >Economic Advocate</option>
                                <option >National Partner</option>
                                <option >Pioner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="amount"> Membership Fee:</label>
                            <input type="text" name="amount" class="form-control">
                        </div>
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="descriptions"> Discription:</label>
                            <input type="text" name="descriptions" class="form-control">
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