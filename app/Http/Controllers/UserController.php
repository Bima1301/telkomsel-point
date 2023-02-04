<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'page' => '',
            'active' => 'dashboard'
        ];
        return view('pages.index',$data);
    }
}
