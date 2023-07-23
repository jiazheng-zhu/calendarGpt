<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{

    /**
     * User login page.
     *
     */
    public function login()
    {
        return view('login');
    }

    /**
     *user exit
     *
     */
    public function user_exit()
    {
        session()->pull('users_id');
        session()->pull('users_name');
        return view('login');
    }

    /**
     * User login processing.
     * $request Information submitted by the form
     *
     */
    public function login_store(Request $request)
    {
        $user_name = $request->user_name;
        $password = $request->password;
        $users = User::where('user_name',"$user_name")->first();
        if (!empty($users)) {
            if (Hash::check($password, $users->password)) {
                session(['users_id'=>$users->id]);
                session(['users_name'=>$user_name]);
                return redirect('/');
            }else{
                $request->flashExcept('_token','password');
                return redirect('/login')->with('messages', 'Password error');
            }
        }else{
            $request->flashExcept('_token','password');
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'The username you entered was not found');
        }

    }


    /**
     * register
     *
     */
    public function signup()
    {
        return view('register');
    }

    /**
     * register store
     *
     */
    public function signup_store(Request $request)
    {
        $tab = new User;
        $user_name = $request->input('user_name','');
        $tab->user_name = $user_name;
        $tab->mailbox = $request->input('mailbox','');
        $tab->sex = $request->input('sex','');
        if ($request->input('password','') != $request->input('Confirm_Password','')){
            $request->flashExcept('_token');
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'The two passwords do not match');
        }
        $tab->password = Hash::make($request->input('Confirm_Password',''));
        $user_data = $tab->where('user_name',$user_name)->get();
        if (!empty($user_data[0])){
            $request->flashExcept('_token');
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'User already exists');
        }else{
            if($tab->save()){
                return redirect('/login')->with('messages', 'Register successfully');
            }else{
                return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'login has failed!');
            }
        }
    }


    /**
     * Reset Password
     *
     */
    public function reset_password()
    {
        $id =session('users_id');
        if (empty($id)){
            return redirect('/login');
        }
        return view('reset_password');
    }
    /**
     * Reset Password store
     *
     */
    public function reset_password_store(Request $request)
    {
        $id =session('users_id');
        if (empty($id)){
            return redirect('/login');
        }
        if ($request->Confirm_Password != $request->Password){
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'The two passwords do not match');
            exit;
        }
        $tab = User::find($id);
        $Old_password =  $request->input('Old_password','');

        if (Hash::check("$Old_password", $tab->password)) {
            // 密码匹配
            $tab->password =  Hash::make($request->input('Password',''));
            if($tab->save()){
                session()->pull('users_id');
                session()->pull('users_name');
                return redirect('/login')->with('messages', 'Password modification successful');
            }else{
                return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Modification failed');
            }
        }else{
            $request->flashExcept('_token','Confirm_Password','Password');
            return redirect($_SERVER['HTTP_REFERER'])->with('messages', 'Old password error');
        }
    }



}
