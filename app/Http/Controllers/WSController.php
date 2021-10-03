<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;

class WSController extends Controller
{
    public function index(){
        $count = DB::table('workshops')->count();
        return view ('daftar-kegiatan',[
            "ws" => Workshop::all(),
            "title" => "Daftar Kegiatan",
            "count" => $count
        ]);
    }
    public function detail($id){
        $detail_ws = Workshop::where('id',$id)->first();
        $count = DB::table('workshops')->count();
        return view ('detail-kegiatan',[
            "ws" => $detail_ws,
            "title" => $detail_ws->title,
            "count" => $count
        ]);
    }
}
