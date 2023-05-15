<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
    @include('includes/css')
    <title>Login</title>
</head>

<body class="body">
    <div class="container-fluid  login-form">
        <div class="row c-row">
            <div class="col-lg-7 col-md-12 col-sm-12 bg-img">
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 login-div">
                <div class="welcome-login">
                    <img src="images/AWCCI_logo.png" alt="..." width="120" height="120"
                        class="rounded-circle img-thumbnail mt-3">
                    <h1 class="mt-3" style="color:white;">Login To Continue</h1>
                </div>
                <form action="login" method="POST" id="loginForm">
                    @csrf
                    <div class="form-row mx-5 my-5">
                        <div class="col-lg-12">
                            <div class="email-input">
                            @if (session('warning'))
                                <div class="alert alert-danger">
                                   <i class="fa-solid fa-circle-exclamation"></i> {{session('warning')}}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    <i class="fa-solid fa-square-check"></i> {{session('success')}}
                                </div>
                            @endif
                                <div class="form-group">
                                    <label for="username" style="color:white">Username or Email address:</label>
                                    <input type="email" name="username" class="form-control" placeholder="Enter email" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="password" style="color:white">Password:</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off">
                                </div>
                                <button type="submit" class="custom-btnLogin">login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
   @include('includes/script')
</body>
</html>
