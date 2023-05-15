@extends('main')

@section('title','Events')
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
   <div class="col-lg-12">
        <div class="title d-flex">
            <h2 class="mr-auto">Events</h2>
            <a href="{{URL::TO('add-events')}}" class="custom-btn float-right">
            <i class="fa-solid fa-plus"></i> Add Event</a>
        </div>
    </div>
</div>
<div class="row">
    @foreach($event as $item)
     <div class="col-lg-6 col-md-6 col-sm-12 p-4">
        <div class="card">
            <img src="{{ URL::asset('images/events/'.$item->eventPhoto) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> {{$item['eventType']}} - {{$item['eventDate']}}</h5>
                <h3 class="newsTitle"> <a href={{'event/'.$item['eventID']}}>{{$item['eventName']}}</a></h3>
                <p class="card-text">{!! Str::limit($item->eventDescription, 80)  !!}</p>
                <div>
                    <a href={{'event/'.$item['eventID']}} class="mr-2 c"><i class="fa-solid fa-eye"></i></i></a>
                    <a href={{'edit/'.$item['eventID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                    <a href={{'delete/'.$item['eventID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
                </div> 
            </div>  
        </div>
     </div>
     @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                {{$event->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection
