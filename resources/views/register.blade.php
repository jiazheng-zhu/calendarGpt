
<!DOCTYPE html>
<html>
<head>
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="/css/snow.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="top-buttons-agileinfo">
    <a href="/login"  class="active">Log In</a><a href="/signup">Sign up</a>
</div>
<div class="main-agileits">
    <!--form-stars-here-->
    <div class="form-w3-agile">
        <h2 class="sub-agileits-w3layouts">Sign up</h2>
        <form action="/signup_store" method="post">
            @csrf
            <input type="text" name="user_name" placeholder="User name" value="{{ old('user_name') }}" required="" />
            <input type="email" name="mailbox" placeholder="Mailbox" value="{{ old('mailbox') }}"  required="" />
            <input type="password" name="password" placeholder="Password" required="" />
            <input type="password" name="Confirm_Password" placeholder="Confirm Password" required="" />
            <span style="color: #ffffff">Gender：</span><input type="radio" name="sex" value="Girl">Girl
            <input type="radio" name="sex" value="Boy" >Boy
            <input type="radio" name="sex" value="Secrecy" checked="checked">Secrecy
            <div class="submit-w3l">
                <input type="submit" value="Sign up">
            </div>
            @if(Session::has('messages'))
                <br>
                <div style="margin-left: 40px;color: 	#DC143C" class="alert alert-info" > {{Session::get('messages')}}
                </div>
            @endif
            <p class="p-bottom-w3ls">If you already have an account,<a href="/login"> click here to log in.</a></p>
        </form>
    </div>
</div>

<script src="https://www.jq22.com/jquery/jquery-1.10.2.js"></script>

</body>
</html>
