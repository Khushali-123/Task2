<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function edit($userId){

    try{
        if (!Auth::check()){
            return redirect('login');
        }
        return view('profile')->with('user',user::find(Auth::user()->id));
    }
    catch (\Exception $e) {
        \Log::error ($e);
    }

    }

    public function update($userId, Request $request){
        try{
            $data = $request->all();
           
           
            $user = User::findOrFail($userId);
           
            $user->user_id =  \Auth::user()->id;
            $user->fname = $data['fname'];
            $user->lname = $data['lname'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = $data['password'];
            $user ->save();
            return redirect()->route('profile');

           }catch (\Exception $ex){
            \Log::error($ex);
            // dd($ex);
        }
  }

    
}
