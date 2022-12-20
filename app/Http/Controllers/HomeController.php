<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Pelanggan;


date_default_timezone_set("Asia/Jakarta");

class HomeController extends Controller
{
    public function index()
    {
            $userid = Auth::user()->id;
            $nama = User::where('id' , $userid)->value('name');
            $username = User::where('id' , $userid)->value('username');
            $today = date('d F Y');
            $day = date('N');
            if($day == '1')
            {
                $dayname = 'Senin';
            }
            elseif($day == '2')
            {
                $dayname = 'Selasa';
            }
            elseif($day == '3')
            {
                $dayname = 'Rabu';
            }
            elseif($day == '4')
            {
                $dayname = 'Kamis';
            }
            elseif($day == '5')
            {
                $dayname = 'Jumat';
            }
            elseif($day == '6')
            {
                $dayname = 'Sabtu';
            }
            else{
                $dayname = 'Minggu';
            }
            $time = date('H:i:s');
            
            if($time >= '06:00:00' && $time < '18:00:00')
            {
                $iconday = "icon-sun";
            }
            else{
                $iconday = "icon-moon";
            }

            $sumdata = Pelanggan::where('user_id' , $userid)->count();

            return view('home' , compact(
                'nama',
                'username',
                'today',
                'iconday',
                'sumdata',
                'dayname'
            ));
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
