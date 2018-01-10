<?php

namespace App\Http\Controllers;
use  App\Events\UserSignedUp;
use App\Events\NewMsg;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Auth;
class TimelineController extends Controller
{
    public function index() {
        if (Auth::check()) {
            event(new UserSignedUp(Auth::user()));
        }          
    return view('timeline');
    }
    public function postMsg(Request $request) {
    	event(new NewMsg(
    		$request->input('msg'), 
    		Auth::user()
    	)
    );
    }
}
