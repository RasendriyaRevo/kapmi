<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Provinsi;
use App\Wilayah;

class homeController extends Controller
{
    //
    public function view(){
        return view('index');
    }

    public function login(){
        return view('login');
    }

    public function register(){
        $prov=Provinsi::all();
        return view('register',['provinsi'=>$prov]);
    }

    public function getWilayah(Request $req){
        if($req->idprov == '0'){
            $value = 0;
            return response()->json($value);
        }else{
            $wilayah = Wilayah::where('id_provinsi',decrypt($req->idprov))->get();
            $id=array();
            $nm=array();
            foreach($wilayah as $wil){
                array_push($id,encrypt($wil->id));
                array_push($nm,$wil->nm_wilayah);
            }

            return response()->json(['id'=>$id,'nm_wilayah'=>$nm]);
        }
    }
    
    public function getSekolah(Request $req){
        if($req->idwil == '0'){
            $value = 0;
            return response()->json($value);
        }else{
            $sekolah = Sekolah::where('id_wilayah',decrypt($req->idwil))->get();
            $id=array();
            $nm=array();
            foreach($sekolah as $sek){
                array_push($id,encrypt($sek->id));
                array_push($nm,$sek->nm_sekolah);
            }
            return response()->json(['id'=>$id,'nm_sekolah'=>$nm]);
        }
    }
}
