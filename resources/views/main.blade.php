<!doctype html>
<html @lang('en')>
<head>
 @include('includes/head')
 @include('includes/css')
</head>

<body>
  @include('includes.nav') 
  <div class="p_120">
  <div id="wrapper" class="toggled">
    @include('includes.menu')
  
    <div id="page-content-wrapper"> 
      <div class="container-fluid">
        <div class="container"> 
          @yield('content')
        </div>    
      </div>      
    </div>        
  </div>     
</div>
  @include('includes/script')

@yield('script')
</body>
</html>