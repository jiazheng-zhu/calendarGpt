<?php
class Num_Chinese{
    private $Month_E = array(1  => "January",
        2  => "February",
        3  => "March",
        4  => "April",
        5  => "May",
        6  => "June",
        7  => "July",
        8  => "August",
        9  => "September",
        10 => "October",
        11 => "November",
        12 => "December");
    public function Month_E($Num){
        return $this -> Month_E[$Num];
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,table tr th, table tr td { border:1px solid #0094ff;padding: 10px 30px 10px 30px;background-color: #0fb1ff }
        table { width: 200px; min-height: 25px; line-height: 25px; text-align: center; border-collapse: collapse;}
        body{
            background-color: 	#F8F8FF;
        }
    </style>
</head>
<body>
@include('top')

<div style="width: 1280px;height: 900px;margin: 0 auto">

    @if(Session::has('messages'))
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-bullhorn"></i> {{Session::get('messages')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
        <form action="/reset_password_store" method="post">
            @csrf
            <div class="col">
                <input type="text" class="form-control input-round" required  value="{{old('Old_password')  }}" name="Old_password" placeholder="Old password">
            </div>
            <br>
            <div class="col">
                <input type="password" class="form-control input-round" required  name="Password" placeholder=" password">
            </div>
            <br>
            <div class="col">
                <input type="password" class="form-control input-round" required  name="Confirm_Password" placeholder="Confirm Password">
            </div>
            <br>
            <div class="col">
                <button type="submit" class="btn btn-warning  btn-round" style="width: 100%;">Confirm modification</button>
            </div>
        </form>

</div>
@include('footer')

</body>
</html>

