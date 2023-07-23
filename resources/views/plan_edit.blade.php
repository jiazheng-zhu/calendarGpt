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
    <div class="row">
        <div class="col-lg-12">
            <div class="contents">
                <h3>Edit plans</h3>
                <hr>
                <form action="/plan_edit_store" method="post">
                    @csrf
                    <input type="hidden" name="eidt_id" value="{{$data->id}}">
                    <div class="col">
                        <input type="datetime-local" class="form-control input-round" required value="{{$data->date}}" name="date" placeholder="First name">
                    </div>
                    <br>
                    <div class="col">
                        <textarea class="form-control" name="plan_content" placeholder="Please enter your plan" required id="exampleFormControlTextarea1" >{{$data->plan_content}}</textarea>
                    </div>
                    <br>
                    <div class="col">
                        <select name="status" class="form-control input-round" id="">
                            @if($data->status == 0)
                            <option value="{{$data->status}}">Current Plan Status：Incomplete</option>
                            <option value="1">Completed</option>
                            @else
                                <option value="{{$data->status}}">Current Plan Status： Completed </option>
                                <option value="0">Incomplete</option>
                            @endif
                        </select>
                    </div>

                    <br>
                    <div class="col">
                        <button type="submit" class="btn btn-warning  btn-round" style="width: 100%;">Confirm modification</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@include('footer')
