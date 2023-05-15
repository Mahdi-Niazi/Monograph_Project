@extends('main')

@section('title','Events')
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
        @foreach($data as $item)
        <div class="col-lg-12 col-sm-12">
            <img src="{{ URL::asset('images/events/'.$item->eventPhoto) }}" class="rounded img-single img-fluid mx-auto d-block" alt="">
            <a href="#" class="a">
                <h4 class="h4-single text-center">{{$item['eventName']}}</h4>
            </a>
            <div class="row">
                <div class="col-lg-12 col-sm-12 p-2">   
                    <hr>
                    <div class="d-flex justify-content-center">
                    <span class="mr-2"><i class="fa-regular fa-clock"></i> </span><span class="mr-2"> {{$item['eventDate']}} - </span>
                    <span class="mr-2"><i class="fa-solid fa-location-dot"></i> </span><span class="mr-2"> {{$item['eventVenue']}} - </span>
                    <span class="mr-2"><i class="fa-solid fa-people-roof"></i> </span><span class="mr-2"> {{$item['eventOrganizer']}} - </span>
                    <span class="mr-2"><i class="fa-solid fa-handshake-simple"></i> </span><span class="mr-2"> {{$item['eventPartner']}} -</span>
                    <span class="mr-2"><i class="fa-solid fa-list"></i> </span><span class="mr-2"> {{$item['eventType']}}</span>
                   </div>
                    <hr>
               </div>
            </div>   
            {!! $item->eventDescription !!}
        </div>
        @endforeach
    </div>
@endsection

@section('script')

@endsection
