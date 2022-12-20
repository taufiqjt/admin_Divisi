<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $username = Auth::user()->username;
        $sumdata = Pelanggan::where('user_id' , Auth::user()->id)->count();

        return view('profile' , compact('name' , 'username' , 'sumdata'));
    }

    public function editnama(Request $request)
    {
        $old = $request->oldname;
        $name = $request->name;

        if( Auth::user()->name == $name){
            return redirect()->back()->with("failededit","Nama sama");
        }

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->with('failededit', 'Edit nama Gagal');   
            }
            else{
                User::where('id' , Auth::user()->id)
                    ->update([
                        'name' => $name
                    ]);
                    return redirect()->back()->with('successedit', 'Edit nama Berhasil');
            }
    }

    public function editusername(Request $request)
    {
        $username = $request->username;
    
        if(Auth::user()->username == $username){
            return redirect()->back()->with("failededit","Username sama");
        }

        $validator = Validator::make(
            $request->all(),
            [
                'username' => 'required'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('failededit', 'Edit Username Gagal');   
            }
            else{
                User::where('id' , Auth::user()->id)
                    ->update([
                        'username' => $username
                    ]);
                    return redirect()->back()->with('successedit', 'Edit Username Berhasil');
            }

            
    }

    public function editpassword(Request $request)
    {
        $old = $request->oldpassword;
        $new = $request->newpassword;
        $confirm = $request->confirmnewpassword;

        if (!(Hash::check($old, Auth::user()->password))) {
            return redirect()->back()->with("failededit","Password lama tidak sesuai");
        }
    
        if(strcmp($old, $new) == 0){
            return redirect()->back()->with("failededit","Password baru dan Password lama sama");
        }

        if($new != $confirm){
            return redirect()->back()->with("failededit","Konfirmasi Password berbeda dengan password baru");
        }
    
        $validator = Validator::make(
            $request->all(),[
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmnewpassword' => ['same:newpassword']
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('failededit', 'Edit Password Gagal');   
        }
        else{
        $user = Auth::user();
        $user->password = hash::make($request->newpassword);
        $user->save();
    
        return redirect()->back()->with("successedit","Password berhasil diubah");
            }
    }
}
