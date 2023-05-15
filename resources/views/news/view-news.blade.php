@extends('main')

@section('title','News')
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
    <div class="col-lg-12 col-md-12">
        <div class="title d-flex">
            <h2 class="mr-auto">News</h2>
            <a href="{{URL::TO('add-news')}}" class="custom-btn float-right">
            <i class="fa-solid fa-plus"></i> Add New</a>
        </div>
    </div>
</div>
<div class="row pt-4">
    @foreach ($news as $item)
    <div class="col-lg-6p col-md-6 col-sm-12 p-4">
        <div class="card">
            <img src="{{ URL::asset('images/news/'.$item->newsPhoto) }}" alt="" class="card-img-top">
            <div class="card-body">
                <div class="p-2">
                <h5 class="card-title">{{$item['newsDate']}}</h5>
                <h3 class="newsTitle"> <a href={{'show-news/'.$item['newsID']}}>{{$item['newsTitle']}}</a></h3>
                <p class="card-text">
                    {!! Str::limit($item->newsDescription, 200) !!} [...]
                </p>
            </div>
            <div class="p-4">
                <a href={{'show-news/'.$item['newsID']}} class="mr-2 c"><i class="fa-solid fa-eye"></i></i></a>
                <a href={{'edit-news/'.$item['newsID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                <a href={{'delete-news/'.$item['newsID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
            </div>  
            </div>
        </div>    
    </div>
     @endforeach 
</div>
<div class="row p-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center">
                {{$news->links('pagination::bootstrap-4')}}
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
