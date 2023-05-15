@extends('main')

@section('title','Add News')
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
        <div class="box-shadow col-lg-12 col-sm-12  rounded">
            <div>
                <h2 class="ml-3 mt-3">Add News</h2>
                <form action="" method="post" id="news" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mr-2 ml-2 mt-2 mb-4">
                        <div class="form-group col-md-4 col-sm-12">
                            <label for="newsTitle">News Title</label>
                            <input type="text" class="form-control" placeholder="Enter News Title"
                                name="newsTitle">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 ">
                            <label for="newsPhoto">News Photo</label>
                            <input type="file" name="newsPhoto"  class="form-control">
                        </div>
                        <div class="form-group col-md-4 col-sm-12 ">
                            <label for="newsDate">News Date</label>
                            <input type="date" name="newsDate" class="form-control">
                        </div>
                        <div class="form-group col-md-12 col-sm-12">  
                            <textarea id="summernote" name="newsDescription"></textarea>
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
