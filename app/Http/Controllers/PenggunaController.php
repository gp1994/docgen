<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Validator;

use App\Pengguna;

class PenggunaController extends Controller
{
    function cekLogin(Request $req){

        $validator = Validator::make($req->all(), [
            
            'usrn' => [
                            'required',
                            'min:3',
                            'exists:user,usrn'

                        ],
            'pwd' => [
                            'required',
                            'min:3',
                        ],
        
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user= $req->usrn;
        $pass = md5($req->pwd);
        $na = $req->peng;


        $check = Pengguna::where('usrn',$user)->where('pwd',$pass)->count();

        if( !($check > 0) )  {
             return back()->with('status', 'salah');
        }


        $take = Pengguna::where('usrn',$user)->where('pwd',$pass)->first();

        session(['usrn' => $take->usrn]);
        session(['id' => $take->id]);
        session(['peng'=> $take->peng]);
        session(['pwd' => true ]);

        return redirect('home');

    }

    
    function logout(Request $req){

        $req->session()->regenerate();
        $req->session()->flush();
        
        return redirect('/');

    }
}
