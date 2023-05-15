@extends('main')

@section('title','Edit News')
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
                <h2 class="ml-3 mt-3">Edit News</h2>
                <form action="/edit-news" method="post" enctype="multipart/form-data" id="news">
                    @csrf
                    @foreach ($news as $item)                            
                    <div class="form-row mr-2 ml-2 mt-2 mb-4">
                        <div class="form-group col-md-4 col-sm-12">
                            <input type="hidden" name="newsID" value="{{$item['newsID']}}">
                            <label for="newsTitle">News Title</label>
                            <input type="text" class="form-control" name="newsTitle" value="{{$item['newsTitle']}}">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 ">
                            <label for="newsPhoto">News Photo</label>
                            <input type="file" name="newsPhoto" class="form-control" value="{{$item['newsPhoto']}}">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 ">
                            <label for="newsDate">News Date</label>
                            <input type="date" name="newsDate" class="form-control" value="{{$item['newsDate']}}">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">  
                            <textarea id="summernote" name="newsDescription">{{$item['newsDescription']}}</textarea>
                        </div>
                        <button type="submit" class="custom-btn mt-3">Update</button>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
