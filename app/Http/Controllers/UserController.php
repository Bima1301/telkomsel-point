<?php

namespace App\Http\Controllers;

use App\Models\Merchandise;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $realtimeStatus = Merchandise::join('realtime_statuses', 'merchandises.realtime_status_id', '=', 'realtime_statuses.id')->latest('realtime_statuses.created_at')->get();
        $data = [
            'page' => '',
            'active' => 'dashboard',
            'realtime_status' => $realtimeStatus
        ];
        return view('pages.index', $data);
    }
    public function show()
    {
        $user_with_store = User::where('users.id', '!=', auth()->user()->id)->leftJoin('stores' , 'users.id_store_position' ,'=' , 'stores.id')->select('users.*', 'stores.store_name')->latest('users.created_at')->get();
        // dd($user_with_store);
        $data = [
            'page' => '',
            'active' => 'dashboard',
            'users' => $user_with_store,
            'stores' => Store::get(),
        ];
        // dd($data);
        return view('pages.user.show', $data);
    }
    public function update(Request $request, $user_id)
    {
        
        if ($request->role) {
            User::where('id', '=', $user_id)->update([
                'role' => $request->role
            ]);
            return redirect()->back()->with('success', 'Role user has been changed!');
        }

        if ($request->id_store_position) {
            // dd('ini posisi');
            $cek_PIC = User::where('users.id_store_position', '=', $request->id_store_position)->join('stores', 'users.id_store_position', '=', 'stores.id')->first();
          
            $isPIC = User::where('id', '=', $user_id)->first('role');
            // dd($isPIC->role);

            if ($isPIC->role == 'PIC') {
                if (!$cek_PIC) {
                    User::where('id', '=', $user_id)->update([
                        'id_store_position' => $request->id_store_position
                    ]);
                    return redirect()->back()->with('success', 'PIC store position has been changed!');
                } else {
                    return redirect()->back()->with('pic_failed', 'There is a PIC with the same store!');
                }
                
            } elseif ($isPIC->role == 'CS') {
                User::where('id', '=', $user_id)->update([
                    'id_store_position' => $request->id_store_position
                ]);
                return redirect()->back()->with('success', 'CS store position has been changed!');
            } elseif ($isPIC->role == 'basicUser') {
                return redirect()->back()->with('pic_failed', 'Please add role first!');
            }
        }
    }
}
