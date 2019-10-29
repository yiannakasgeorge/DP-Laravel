<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ URL::asset('css/admin/app.css') }}" />
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/> -->
    <title>Login - {{ config('app.name') }}</title>
</head>
<body>


<div class="sidenav">
    <div class="login-main-text">
        <div class="logo"></div>
            <p>Whole Grain Inc.</p>
    </div>       
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form class="login-form" action="{{ route('admin.login.post') }}" method="POST" role="form">
                    @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="Email" class="form-control" placeholder="Email" name="email" type="email" id="email" autofocus value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password"  class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                <label><input type="checkbox" name="remember"><span class="label-text">Stay Signed in</span></label>
                <button type="submit" class="btn btn-black" value="submit">Login</button>
                </div>
                
            </form>
        </div>
    </div>
</div> 

<script type="text/javascript" src="{{ URL::asset('js/admin/app.js') }}"></script>

</body>
</html>