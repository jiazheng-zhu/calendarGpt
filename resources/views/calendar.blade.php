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
    <div style="float: left;width:490px;overflow: scroll;height:760px;background-color: #F0F8FF;padding: 20px">
        <br>
        <form action="/calendar" method="get">
            @csrf
            <div class="row" style="margin-left: 5px">
                <div class="col">
                    <input type="date" class="form-control input-round" value="{{ old('date') }}"   name="date" placeholder="First name">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-round" style="margin-left: -20px">Search</button>
                    <a href="/calendar" class="btn btn-warning btn-round" >Resetting</a>
                </div>
            </div>
        </form>
        <hr>
        <form action="/users_plan_store" method="post">
            @csrf
            <div class="col">
                <input type="datetime-local" class="form-control input-round" required  name="date" placeholder="First name">
            </div>
            <br>
            <div class="col">
                <textarea class="form-control" name="plan_content" placeholder="Please enter your plan" required id="exampleFormControlTextarea1" ></textarea>
            </div>
            <br>
            <div class="col">
                <button type="submit" class="btn btn-warning  btn-round" style="width: 100%;">Add plan</button>
            </div>
        </form>
        <hr>
        @if(empty($date_month))
        <h1>{{date('m')}}-{{date('Y')}} Today's Plan</h1>
        @else
            <h1>{{$date_month}} Today's Plan</h1>
        @endif
        @foreach($date_month_all as $k=>$value)
            <p>({{$k+1}}) <span>{{substr($value->date,10,10)}}</span><span style="margin-left: 20px">{{$value->plan_content}}</span>
                @if($value->status==0)
                    (incomplete)
                @else
                    (Completed)
                @endif</p>
        @endforeach
        @if(!empty($date_month_all[0]['date']))
        <a href="/plan_details/{{$date_month_all[0]['date']}}" class="btn btn-outline-primary btn-round" style="width: 100%;">Automatically generate</a>
        @else
            <p>No plans found</p>
        @endif
            <hr>
        <h1>All plans for this month</h1>
        @if(empty($data_all[0]['date']))
        <p>No plans found</p>
        @endif
        @foreach($data_all as $k=>$value)
            <p>({{$k+1}}) <span>{{substr($value->date,5,10)}}</span><span style="margin-left: 20px">{{$value->plan_content}}</span></p>
        @endforeach
        @if(!empty($data_all[0]['date']))
        <a href="/plan_tabulation?date={{$data_all[0]['date']}}" class="btn btn-outline-primary btn-round" style="width: 100%;">To modify</a>
        @endif
    </div>
    <div style="float: right;width:760px;height: 760px;background-color: #F0F8FF;padding: 30px;padding-top: 0px;">


            <?php
            $da = new Num_Chinese();
            $yin_yue = $da -> Month_E($newstring);
            ?>
                @if(empty($request->date))
                    <h1>{{$yin_yue}}-{{$year}}</h1>
                @else
                    <h1>{{substr($date_month, 0, 7)}} </h1>
                @endif
        <?php
        //  get the current month and year
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        // get  the first day of the month
        $first_day = date("N", strtotime($year . "-" . $month . "-01"));
        // get the name of the month
        $cols = 7;

        //  set up the table
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
            echo "<th>Sun</th>";
            echo "<th>Mon</th>";
        echo "<th>Tue</th>";
        echo "<th>Wed</th>";
        echo "<th>Thu</th>";
        echo "<th>Fri</th>";
        echo "<th>Sat</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // start the table row
        echo "<tr>";
        // output blank cells until the first of the month
        for ($i = 0; $i < $first_day; $i++) {
            echo "<td></td>";
        }
        // set variable to keep track of where we are in the loop
        for ($i = 1; $i <= $days_in_month; $i++) {
            // display the day number in the cell
            if (($i + $first_day - 1) % $cols == 0) {
                echo "</tr><tr>";
            }
            if ($i == 1){
                $i=sprintf("%02d",1);
            }
            $sel_date = $year.'-'.$month.'-'.$i;
            $data_count = DB::table('users_plan')->where('date','like','%'.$sel_date.'%')->where('users_id',session('users_id'))->count();
            $huodong = "<br> <span style='color: #fff'>$data_count Plans</span>";
            echo "<td style='width: 50px'>" . "<span style='font-size: 25px;font-weight: 800'>$i</span>".$huodong . "</td>";
        }
        //      output blank cells until we reach the end of the month
        for ($i = $first_day + $days_in_month - 1; $i % $cols != $cols - 1; $i++) {
            echo "<td></td>";
        }
        echo "</tr>";

        // close the table
        echo "</tbody>";
        echo "</table>";
        ?>

    </div>

</div>
@include('footer')

</body>
</html>

