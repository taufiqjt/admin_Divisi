<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
            return view('home');
    }

    // public function search(Request $request)
    // {
    //         $userid = Auth::user()->id;
    //         $data = DB::table('tb_pelanggan')
    //         ->where('id_pelanggan' , $request->idpel)
    //         ->get();
    //         $name = User::where('id' , $userid)->value('name');

    //         return view('home' , compact('data' , 'name'));
    // }
}
