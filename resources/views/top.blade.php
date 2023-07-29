<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Calender Gpt</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
    <link href="/style/index/assets/css/main.css" rel="stylesheet"/>
    <link href="/style/index/assets/css/indexs.css" rel="stylesheet"/>
</head>
<body>
<style>
    .nav {
    }

    .nav>li {
        float: left;

    }

    li {
        list-style: none;
    }

    #nav a {
        display: block;
        text-decoration: none;
        height: 40px;
        width:200px;
        text-align: center;
        line-height: 40px;
        box-sizing: border-box;

    }


    .nav>li>a:hover {
        background-color: lightyellow;
    }

    .nav>li>ul>li>a {
        /* display: none; */
        border: 1px solid #000000;
        border-top: none;
    }

    .nav>li>ul>li>a:hover {
        background-color: lightyellow;
    }
    .nav-a a{
        background-color: lightyellow;
        color: #000000;
    }

    .nav>li>ul {
        display: none;
        position: fixed;
        top: 50px;
        z-index: 1030;
    }
</style>

<nav class="topnav navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/"><strong>Calendar Gpt</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarColor02" style="">
            <ul class="navbar-nav mr-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/calendar">Calendar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/plan_tabulation">Plan Status</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto d-flex align-items-center">
                <li class="nav-item highlight">
                    @if(!empty(session('users_name')))
                        <ul class="nav" id="nav">
                            <li>
                                <a href="">{{session('users_name')}}</a>
                                <ul style="margin-left: -40px" class="nav-a">
                                    <li><a href="/reset_password">Reset Password</a> </li>
                                    <li><a href="/user_exit">Log Out</a> </li>
                                </ul>
                            </li>
                        </ul>

                        <script>
                            var heads = document.querySelectorAll('.nav>li');
                            for (var i = 0; i < heads.length; i++) {
                                heads[i].onmouseover = function() {
                                    this.children[1].style.display = "block";
                                }
                                heads[i].onmouseout = function() {
                                    this.children[1].style.display = "none";

                                }
                            }
                        </script>
                    <!-- <a class="nav-link" href="/user_exit">{{session('users_name')}}</a> -->
                    @else
                        <a class="nav-link" href="/login">Log In</a>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->


<!-- End Header -->



<!--------------------------------------
JAVASCRIPTS
--------------------------------------->
<script src="/style/index/assets/js/vendor/jquery.min.js" type="text/javascript"></script>
<script src="/style/index/assets/js/vendor/popper.min.js" type="text/javascript"></script>
<script src="/style/index/assets/js/vendor/bootstrap.min.js" type="text/javascript"></script>
<script src="/style/index/assets/js/functions.js" type="text/javascript"></script>
</body>
</html>
