
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/css/snow.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="top-buttons-agileinfo">
    <a href="/login"  class="active">Log in</a><a href="/signup">Sign up</a>
</div>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <h2 class="sub-agileits-w3layouts">Log in</h2>
        <form action="/login_store" method="post">
            @csrf
            <input type="text" name="user_name" placeholder="User name" value="{{ old('user_name') }}"  required="" />
            <input type="password" name="password" placeholder="Password" required="" />
            <div class="submit-w3l">
                <input type="submit" value="Log in">
            </div>
            @if(Session::has('messages'))
                <br>
                <div style="margin-left: 40px;color: 	#DC143C"> {{Session::get('messages')}}</div>
            @endif
            <p class="p-bottom-w3ls"><a href="/signup">Register Here</a>If you don't already have an account.</p>
        </form>
    </div>
</div>

<script src="https://www.jq22.com/jqucomery/jquery-1.10.2.js"></script>

</body>
</html>
