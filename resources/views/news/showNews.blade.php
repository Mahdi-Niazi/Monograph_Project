@extends('main')

@section('title','View News')
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
        @foreach($data as $item)
        <div class="col-lg-12 col-sm-12">
            <img src="{{ URL::asset('images/news/'.$item->newsPhoto) }}" class="rounded img-single img-fluid mx-auto d-block" alt="News Image">
            <a href="#" class="a">
                <h4 class="h4-single text-center">{{$item['newsTitle']}}</h4>
            </a>
            <div class="row">
                <div class="col-lg-12 col-sm-12 p-4">   
                    <hr>
                    <div class="d-flex justify-content-center">
                    <span class="mr-2"><i class="fa-regular fa-clock"></i> </span><span class="mr-2"> {{$item['newsDate']}} </span>
                   </div>
                    <hr>
               </div>
            </div>   
            {!! $item->newsDescription !!}
        </div>
        @endforeach
    </div>
@endsection

@section('script')

@endsection
