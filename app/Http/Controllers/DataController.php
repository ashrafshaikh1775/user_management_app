<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DataController extends Controller
{
    public function login()
    {
     return view('login');
    }
    public function register()
    {
      return view('welcome');
    } 
    public function registerUser(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'gender'=>'required',
        ]);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $res = $user->save();
        if($res)
        {
             return back()->with('success','You are rergistered successfully');
        }
        else
        {
            return back()->with('fail','Something Wrong');
        }
    }
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
    
        ]);
        $user = User::where('email','=', $request->email)->first();
        if($user){

               if($request->password == $user->password)
               {
                $request->session()->put('loginId' , $user->id);
                return redirect('dashboard');
               }
               else{
                return back()->with('fail','Password not matches.');
               }
            }
            else
            {
                return back()->with('fail','This email is not registered.');
            }
       
    }
    public function dashboard(Request $request){
       $data = array();
       if($request->session()->has('loginId'))
       {
        $data = User::where('id','=',$request->session()->get('loginId'))->first();
       }
       return view('view_detail' , compact('data'));
    }
    public function logoutUser(Request $request){
        $data = array();
        if($request->session()->has('loginId'))
        {
         $request->session()->pull('loginId');
         return redirect('');
        }
     }
     
     public function updateUserData(Request $request){
      
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:5|max:12',
            'gender'=>'required'
        ]);
        if($request->session()->has('loginId'))
        {
        $user = User::find($request->session()->get('loginId'));
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $res = $user->update();

        if($res)
        {
             return back()->with('success','Your Informations have been Updated');
        }
        else
        {
            return back()->with('fail','Something Wrong');
        }
    }
    }
}
