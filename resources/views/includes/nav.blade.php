<nav class="navbar navbar-dark bg-white box-shadow fixed-top">
    <a href="#menu-toggle" id="menu-toggle" class="nav-item nav-a p-2">
        <i class="fa-solid fa-align-left"></i>    
    </a> 
    <div class="dropdown">
        <a class="dropbtn">
            <span class="nav-a"> {{auth()->user()->name}} </span> <i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
            <a href="{{'/edit-profile/'}}"><i class="fa-solid fa-user"></i> Edit Profile</a>
            <a href="/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log out</a>
        </div>
    </div>
</nav>