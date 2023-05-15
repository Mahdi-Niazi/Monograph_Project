@extends('main')

@section('title','Add Event')
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
                <h2 class="ml-3 mt-3">Add Event</h2>
            </div>
            <form action="" method="post" id="event" enctype="multipart/form-data">
                    @csrf
                <div class="form-row mr-2 ml-2 mt-2 mb-4">
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventName">Event Title:</label>
                            <input type="text" class="form-control" placeholder="Event Title"
                                name="eventName">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventDate">Event Date:</label>
                            <input type="date" class="form-control" placeholder="Event Date"
                                name="eventDate">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventVenue">Event Venue:</label>
                            <input type="text" class="form-control" placeholder="Event Venue"
                                name="eventVenue">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventOrganizer">Event Organizer:</label>
                            <input type="text" class="form-control" placeholder="Event Organizer"
                                name="eventOrganizer">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventPartner">Event Partner:</label>
                            <input type="text" class="form-control" placeholder="Event Partner"
                                name="eventPartner">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label for="eventPhoto">Event Photo:</label>
                            <input type="file" class="form-control" 
                                name="eventPhoto">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">
                            <label for="eventType">Event Type:</label>
                            <input type="text" class="form-control" 
                                name="eventType">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">  
                            <textarea id="summernote" name="eventDescription"></textarea>
                        </div>
                            <button type="submit" class="custom-btn mt-3">Save</button>
                    </div>
                </div>    
            </form>
        </div>
    </div>
@endsection

@section('script')

@endsection
