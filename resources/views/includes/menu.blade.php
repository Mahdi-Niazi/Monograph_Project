<div id="sidebar-wrapper">
    <div class="awcci-title">
        <img src="{{URL::TO('images/AWCCI_logo.png')}}" alt="..." width="120" height="120"
        class="rounded-circle img-thumbnail ">
        <h6 class="mt-3">Afghanistan Women's Chamber of Commerce and Industry</h6>
    </div>
    <hr class="rounded">
    
    <ul class="navbar-nav menu-ul">
        <li class="nav-item menu-li">
            <a href="{{URL::TO('/dashboard')}}" class="nav-link menu-links">
                <i class="fa-solid fa-gauge-high"></i> Dashboard
            </a>
        </li>
        @if(auth()->user()->role == '2'||auth()->user()->role == '0')
        <li class="nav-item menu-li">
            <a class="nav-link menu-links" href="{{URL::TO('view-members')}}">
            <i class="fa-solid fa-people-group"></i> Members 
            </a>
        </li>
        @endif
        @if(auth()->user()->role == '3'||auth()->user()->role == '0')
        <li class="nav-item menu-li">
            <a href="{{URL::TO('/view-bill')}}" class="nav-link menu-links">
                <i class="fa-solid fa-money-bills"></i> Bills </a>
        </li>
        @endif
        @if(auth()->user()->role == '2'||auth()->user()->role == '0')
        <li class="nav-item menu-li">
            <a href="{{URL::TO('/view-news')}}" class="nav-link menu-links"> <i class="fa-solid fa-newspaper"></i>
                News
            </a>
        </li>
        <li class="nav-item menu-li">
            <a href="{{URL::TO('/view-events')}}" class="nav-link menu-links">           
            <i class="fa-solid fa-calendar"></i>
            Events
            </a>
        </li>
        @endif
        @if(auth()->user()->role == '0')
        <li class="nav-item menu-li">
            <a class="nav-link menu-links" data-toggle="collapse" href="#collapse4">
                <i class="fa-solid fa-gear"></i>
                    Administrator 
                <i class="fa-solid fa-caret-down x"></i></a>
            <div id="collapse4" class="panel-collapse collapse">
                <ul class="sub-menu menu-ul">
                    <li class="nav-item menu-li">
                        <a href="/view-users" class="nav-link menu-links"> <i class="fa-solid fa-user"></i>
                            Users
                        </a>
                    </li>
                    <li class="nav-item menu-li">
                        <a href="/view-employee" class="nav-link menu-links"> <i class="fa-solid fa-briefcase"></i>
                            Employees
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        @endif
    </ul>
</div>

            
                
          

