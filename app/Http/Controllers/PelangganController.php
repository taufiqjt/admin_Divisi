<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;

date_default_timezone_set("Asia/Jakarta");

class PelangganController extends Controller
{
    public function index()
    {

            $search = false;
            $data = Pelanggan::where('user_id' , Auth::user()->id )->orderBy('id' , 'desc')->paginate(50);
            $nama = User::where('id' , Auth::user()->id)->value('name');

            return view('pelanggan' , compact('data' ,'search','nama'));
    }

    public function search(Request $request)
    {
            $search = true;
            $data = Pelanggan::
            where('user_id' , Auth::user()->id )
            ->where('id_pelanggan' , $request->idpel)
            ->orderBy('id' , 'desc')
            ->get();
            $nama = User::where('id' , Auth::user()->id)->value('name');

            return view('pelanggan' , compact('data' ,'search','nama'));
    }

    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        
        return redirect('/pelanggan');
    }

    public function insert(Request $request)
    {
        $userid = Auth::user()->id;
        pelanggan::create([
        'id_pelanggan' => $request->idpelanggan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tarif' => $request->tarif,
        'daya' => $request->daya,
        'gardu' => $request->gardu,
        'user_id' => $userid,   
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),

        ]);

        return redirect('/pelanggan');
    }

    public function edit(Request $request)
    {
        Pelanggan::where('id' , $request->id)
        ->update([
        'id_pelanggan' => $request->idpelanggan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tarif' => $request->tarif,
        'daya' => $request->daya,
        'gardu' => $request->gardu,
        'updated_at' => Carbon::now(),
        ]);

        return back();
    }
}
