@extends('main')

@section('title','Dashboard')
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
            @if(session('danger'))
                <div class="alert alert-danger">
                    <i class="fa-solid fa-circle-exclamation"></i> {{session('danger')}}
                </div>
            @endif
        </div>
        <div class="col-lg-12 col-sm-12">
            <div class="box-shadow">
                <div class="m-4 p-1">
                    <h1>Welcome, {{auth()->user()->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="quick-activity1 p-4 rounded">
              <h3>Total Members</h3>
              <h4 class="count">{{$member}}</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
           <div class="quick-activity2 p-4 rounded">
              <h3>Total Businesses</h3>
              <h4>{{$business}}</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="quick-activity3 p-4 rounded">
              <h3>Total News</h3>
              <h4 class="count">{{$news}}</h4>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
           <div class="quick-activity4 p-4 rounded">
              <h3>Total Events</h3>
              <h4>{{$event}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                   <i class="fa-sharp fa-solid fa-chart-pie"></i> Pie Chart
                </div>
                <div class="card-body">
                    <canvas id="myChart1" width="100px" height="100px"></canvas>
                    <br>
                    <h5 class="card-title">Education Chart</h5>
                    <p class="card-text">This chart will show the level of educations</p>

                </div>
            </div>
        </div>

         <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                 <i class="fa-solid fa-chart-line"></i> Line Chart
                </div>
                <div class="card-body">
                    <canvas id="myChart2" width="100px" height="100px"></canvas>
                    <br>
                    <h5 class="card-title">Membership During Years</h5>
                    <p class="card-text">This chart will shows years of members
                    </p>

                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                  <i class="fa-solid fa-chart-simple"></i> Bar Chart
                </div>
                <div class="card-body">
                        <canvas id="myChart4" width="400" height="400"></canvas>
                    <br>
                    <h5 class="card-title">Members Provinces</h5>
                    <p class="card-text">
                      This chart will shows province of members
                    </p>

                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-chart-area"></i> PolarArea Chart
                </div>
                <div class="card-body">
                    <canvas id="myChart5" width="100px" height="100px"></canvas>
                    <br>
                    <h5 class="card-title">Business Sectors</h5>
                    <p class="card-text">Businesses sectors that registered </p>
                </div>
            </div>
        </div>
    </div>
    <br>
<script type="text/javascript">
    var __ydata = JSON.parse('{!! json_encode($Education_levels)!!}')
    var __xdata = JSON.parse('{!! json_encode($level_count) !!}')

    //Address of Business
    var AddressY = JSON.parse('{!! json_encode($Address_Cities) !!}')
    var Addressx = JSON.parse('{!! json_encode($Address_count) !!}')

    //membership year
    var yeary = JSON.parse('{!!    json_encode($years) !!}')
    var yearx = JSON.parse('{!!   json_encode($year_count) !!}')
    //Sector chart
    var sectorY = JSON.parse('{!!    json_encode($sectors) !!}')
    var sectorX = JSON.parse('{!!   json_encode($sec_count) !!}')
</script>

@endsection
@section('script')

@endsection
