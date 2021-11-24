<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Workshop;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index (){
        $latest= DB::table('workshops')->latest()->first();
        $count = DB::table('workshops')->count();

        $latest_three = DB::table('workshops')
                        ->where('open_ws','<=', now())
                        ->orderBy('created_at', 'DESC')
                        ->limit(3)
                        ->get();
        
        
        return view ('user.beranda',[
            "ws" => $latest,
            "title" => "Beranda",
            "count" => $count,
            "latest_three" => $latest_three
        ]);
    }
    public function detail($id){
        $detail_ws = Workshop::where('id',$id)->first();
        $count = DB::table('workshops')->count();
        return view ('user.detail-kegiatan',[
            "ws" => $detail_ws,
            "title" => "Daftar Kegiatan",
            "count" => $count
        ]);
    }
}