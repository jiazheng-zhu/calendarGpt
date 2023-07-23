@include('top')
<style>
    .contents{
        width: 100%;
        padding: 20px;
        border: 1px solid #000;
        border-radius: 10px;
        height: 100%;
    }
    h3 {
        text-align: center;
    }
</style>
<br>

<div class="container">
    <div class="col-md-12 col-lg-12">
            <p>
                <span style="color: green">{{str_replace(",Plan a reasonable plan arrangement", '',$result)}}</span><br>
                <?php echo nl2br($result);  ?>
            </p>

    </div>
</div>
<div style="width: 100%;color: #000">

<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="contents">
                <h3>All plans</h3>
                <hr>
                @foreach($users_plan as $key=>$value)
                    <p>({{$key+1}}) {{$value->date}}/{{$value->plan_content}}</p>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <div class="contents">
                <h3>Unplanned plans</h3>
                <hr>
            @foreach($users_plan_incomplete as $key=>$value)
                    <p>({{$key+1}}) {{$value->date}}/{{$value->plan_content}}</p>
                @endforeach
            </div>
        </div>
        <div class="col-lg-4">
            <div class="contents">
                <h3>Quick Expected Tasks</h3>
                <hr>
                @foreach($users_plan_Urgent as $key=>$value)
                    <p>({{$key+1}}) {{$value->date}}/{{$value->plan_content}}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

@include('footer')
