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
<div class="container pt-4 pb-4">

    @if(Session::has('messages'))
        <div class="alert alert-danger" role="alert">
            <i class="fas fa-bullhorn"></i> {{Session::get('messages')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="contents">
                <h3>All plans</h3>
                <hr>
                @foreach($users_plan as $key=>$value)
                    <p>({{$key+1}}) {{$value->date}} / {{$value->plan_content}}
                        @if($value->status==0)
                            (incomplete)
                        @else
                            (Completed)
                        @endif
                    </p>
                    <a href="/plan_edit/{{$value['id']}}" class="btn btn-primary btn-round" style="width: 100%;">Edit</a>
                    <br>
                    <br>
                    <a href="/plan_del/{{$value['id']}}" class="btn btn-warning btn-round" style="width: 100%;">Delete</a>
                    <hr>
                @endforeach
            </div>
        </div>

    </div>
</div>


@include('footer')
