<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $realtimeStatus = Merchandise::join('realtime_statuses', 'merchandises.realtime_status_id' , '=' , 'realtime_statuses.id')->latest('realtime_statuses.created_at')->get();
        $data = [
            'page' => '',
            'active' => 'dashboard',
            'realtime_status' => $realtimeStatus
        ];
        return view('pages.index',$data);
    }
    public function show(){
        $data = [
            'page' => '',
            'active' => 'dashboard',
            'users' => User::where('id', '!=', auth()->user()->id)->latest()->get()
        ];
        return view('pages.user.show',$data);
    }
    public function update(Request $request,$user_id){
        // dd($user_id); 
          User::where('id', '=' , $user_id)->update([
            'role' => $request->role
          ]);
          return redirect()->back()->with('success', 'Role user has been changed!');
    }
}
