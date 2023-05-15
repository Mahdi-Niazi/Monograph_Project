<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\event;

class EventController extends Controller
{
    //
    function addEvent(Request $req){
        $newEventName = time(). '-'. $req->eventName . '.'. $req->eventPhoto->extension();
        $req->eventPhoto->move(public_path('images/events'), $newEventName );
        $event = new event;
        $event->eventName=$req->eventName;
        $event->eventDate=$req->eventDate;
        $event->eventVenue=$req->eventVenue;
        $event->eventOrganizer=$req->eventOrganizer;
        $event->eventPartner=$req->eventPartner;
        $event->eventPhoto=$newEventName;
        $event->eventType = $req->eventType;
        $event->eventDescription=$req->eventDescription;
        $event->save();

        
        return redirect('view-events')->with('success', 'Event added successfully');
    }
    function showEvent(){
        $event = event::latest()->paginate(6);
         return view('events.view-events',compact('event'));
    }
    function eventDelete($id){
        $data = event::find($id);
        $data->delete();
        return redirect('view-events')->with('success', 'Event deleted successfully');
    }
    function eventEdit($id){
       $data = event::where('eventID', '=', $id)->get();
       return view('events.edit-event',['data'=>$data]);
    }
    function eventUpdate(Request $req){
        $newEventName = time(). '-'. $req->eventName . '.'. $req->eventPhoto->extension();
        $req->eventPhoto->move(public_path('images/events/'), $newEventName );
        $event = event::find($req->eventID);
        $event->eventName=$req->eventName;
        $event->eventDate=$req->eventDate;
        $event->eventVenue=$req->eventVenue;
        $event->eventOrganizer=$req->eventOrganizer;
        $event->eventPartner=$req->eventPartner;
        $event->eventPhoto=$newEventName;
        $event->eventDescription=$req->eventDescription;
        $event->save();
        return redirect('view-events')->with('success', 'Event updated successfully');
    }
    function viewEvent($id){
        $data = event::select('*')->where('eventID', '=', $id)->get();
        return view('events.event',['data'=>$data]);
    }
}
