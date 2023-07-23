<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_plan;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;

class IndexController extends Controller
{

    /**
     * plan edit.
     *
     */
    public function plan_edit($id)
    {
        $data = Users_plan::find($id);
        return view('plan_edit',compact('data'));
    }
    /**
     * plan edit.
     *
     */
    public function plan_edit_store(Request $request)
    {
        $data = Users_plan::find($request->eidt_id);
        $data->date = str_replace('T', ' ', $request->date);
        $data->plan_content = $request->input('plan_content','');
        $data->status = $request->input('status','');
        if($data->save()){
            return redirect('/plan_tabulation')->with('messages', 'Successfully modified');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Modification failed');
        }
    }
    /**
     * plan tabulation.
     *
     */
    public function plan_tabulation(Request $request)
    {
        $date = $request->date;
        $users_id = session('users_id');
        if (empty($users_id)){
            return redirect('/login');
        }
        $date = substr($date,0,10);//获取的日
        if (!empty($date)){
            $users_plan = Users_plan::where('users_id',$users_id)->where('date','like','%'.$date.'%')->get();
        }else{
            $users_plan = Users_plan::orderBy('date','desc')->where('users_id',$users_id)->get();
        }

        return view('plan_tabulation',compact('users_plan'));
    }
    /**
     * Index.
     *
     */
    public function index()
    {
        return view('index');
    }
    /**
     * Index.
     *
     */
    public function plan_del($id)
    {
        $users_id = session('users_id');
        if (empty($users_id)){
            return redirect('/login');
        }
        $data = Users_plan::where('id',$id)->where('users_id',$users_id)->first();
        if ($data->delete()){
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', ' Successfully deleted a plan');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Delete failed');
        }
    }
    /**
     * Index.
     *
     */
    public function plan_details($date)
    {
        $users_id = session('users_id');
        if (empty($users_id)){
            return redirect('/login');
        }
        $date = substr($date,0,10);//获取的日
//        dump($date);
        $users_plan_Urgent_time = strtotime($date)+86400;//获取的日期加一天时间戳
        $users_plan_Urgent_time_big = strtotime($date)+259200;//获取的日期加3天时间戳
        $users_plan_Urgent_date = date('Y-m-d',$users_plan_Urgent_time);//获取的日期加一天日期，时间戳转成日期
        $users_plan_Urgent_date_big = date('Y-m-d',$users_plan_Urgent_time_big);//获取的日期加3天日期，时间戳转成日期

        $users_plan = Users_plan::where('users_id',$users_id)->where('date','like','%'.$date.'%')->get();
        $users_plan_incomplete = Users_plan::where('status',0)->where('users_id',$users_id)->where('date','like','%'.$date.'%')->get();

        $content = '';
         foreach ($users_plan_incomplete as $value){
           $content .=  $value->date.' '.$value->plan_content.',';
         }

        $plan = $content.'Plan a reasonable plan arrangement';
        $messages = [
            ['role' => 'user', 'content' =>$plan],
        ];
        $gpt_result = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]);
        $result =strval($gpt_result['choices'][0]['message']['content']);
        $users_plan_Urgent = Users_plan::where('status',0)->where('users_id',$users_id)->whereBetween('date', [$users_plan_Urgent_date, $users_plan_Urgent_date_big])->get();
        return view('plan_details',compact('plan','date','result','users_plan_Urgent','users_plan','users_plan_incomplete'));
    }

    /**
     * Index.
     *
     */
    public function calendar(Request $request)
    {
        if (empty(session('users_id'))){
            return redirect('/login');
        }
        if (empty($request->date)){
            // 定义要显示的月份
            $month = date('m');
            $newstring = str_replace('0', '', $month);
            // 定义要显示的年份
            $year = date('Y');
            $date = $year.'-'.$month;
            $date_month = date('Y-m-d');
        }else{
            $month = substr($request->date,5,2);
//            dd($month);
            $year = date('Y');
            $newstring = str_replace('0', '', $month);

            $date = substr($request->date,0,10);
            $date_month = $request->date;
            $request->flashExcept('_token');
        }

        $users_id = session('users_id');
        $data_all = Users_plan::orderBy('date','desc')->where('users_id',$users_id)->where('date','like','%'.$date.'%')->get();
        $date_month_all = Users_plan::orderBy('date','desc')->where('users_id',$users_id)->where('date','like','%'.$date_month.'%')->get();

        return view('calendar',compact('date_month','newstring','month','year','data_all','date_month_all'));
    }



    /**
     *  plan store.
     *
     */
    public function users_plan_store(Request $request)
    {
        $Users_plan = new Users_plan;
        $Users_plan->date = str_replace('T', ' ', $request->date);
        $Users_plan->plan_content = $request->input('plan_content','');
        $Users_plan->users_id = session('users_id');
        if($Users_plan->save()){
            return redirect('/calendar')->with('messages', 'Successfully added a plan');
        }else{
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'add failed!');
        }
    }




}
