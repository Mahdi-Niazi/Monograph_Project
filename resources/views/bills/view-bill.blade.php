@extends('main')

@section('title','View Bills')
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
        <div class="col-lg-12 col-sm-12">
            <div class="box-shadow p-4"> 
                <div class="title d-flex mb-3">
                    <h2 class="mr-auto">View Bills</h2>
                    <a href="{{URL::TO('add-bill')}}" class="custom-btn add-new-btn">
                    <i class="fa-solid fa-plus"></i> Add New</a>
                </div>   
                <div class="table-responsive">
                    <table id="myTable" class="table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Membership Type</th>
                                <th>Membership Fee</th>
                                <th>Register Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($member as $item)
                            <tr>
                                <td>{{$item['billID']}}</td>
                                <td>{{$item['firstName']}}</td>
                                <td>{{$item['lastName']}}</td>
                                <td>{{$item['membershipName']}}</td>
                                <td>{{$item['amount']}}</td>
                                <td>{{$item['registerDate']}}</td>
                                <td>
                                    <a href={{'bill/'.$item['billID']}} class="mr-2 c"><i class="fa-solid fa-eye"></i></i></a>
                                    <a href={{'edit-bill/'.$item['billID']}} class="mr-2 c"><i class="fa-solid fa-pen"></i></a>
                                    <a href={{'deleteBill/'.$item['billID']}} class="mr-2 c"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

@endsection
