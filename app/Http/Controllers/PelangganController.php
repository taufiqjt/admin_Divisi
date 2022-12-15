<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index()
    {
            $search = false;
            $data = Pelanggan::orderBy('id' , 'desc')->paginate(15);

            return view('pelanggan' , compact('data' ,'search'));
    }

    public function search(Request $request)
    {
        $search = true;
        $data = Pelanggan::where('id_pelanggan' , $request->idpel)->get();

        return view('pelanggan' , compact('data' ,'search'));
    }

    public function delete($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        
        return redirect('/pelanggan');
    }

    public function insert(Request $request)
    {
        pelanggan::create([
        'id_pelanggan' => $request->idpelanggan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tarif' => $request->tarif,
        'daya' => $request->daya,
        'gardu' => $request->gardu,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),

        ]);

        return redirect('/pelanggan');
    }

    public function edit(Request $request)
    {
        pelanggan::where('id' , $request->id)
        ->update([
        'id_pelanggan' => $request->idpelanggan,
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tarif' => $request->tarif,
        'daya' => $request->daya,
        'gardu' => $request->gardu,
        'updated_at' => Carbon::now(),
        ]);

        return redirect('/pelanggan');
    }
}
