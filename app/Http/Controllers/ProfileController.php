<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
 
    public function lockscreen(){
        $user = Auth::user();
        if($user->screen_lock !=1){
            User::find($user->id)->update(['screen_lock'=>1]);
        }
        return view('auth.lockscreen',compact('user'));
    }

    public function lockScreenUpdate(Request $request)
    {
        $user = Auth::user();
        if(Hash::check($request->password, $user->password)){
            User::find($user->id)->update(['screen_lock'=>0]);
            return redirect('/')->with('success', 'Unlocked');
        }else{
            return back()->with('error', 'Invalid password');
        }
    }
}
