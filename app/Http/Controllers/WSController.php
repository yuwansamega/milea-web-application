<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WSController extends Controller
{
    public function index(){
        $ws = DB::table('workshops')->paginate(10);
        $count = DB::table('workshops')->count();
        return view ('user.daftar-kegiatan',[
            "workshops" => $ws,
            "title" => "Daftar Kegiatan",
            "count" => $count
        ]);
    }
    public function detail($id){
        
        $detail_ws = Workshop::where('id',$id)->first();
        $count = DB::table('workshops')->count();
        $label_upload = array_filter([$detail_ws->label_upload_1,$detail_ws->label_upload_2,$detail_ws->label_upload_3]);
        $label_download = array_filter([$detail_ws->label_unduh_1,$detail_ws->label_unduh_2,$detail_ws->label_unduh_3,$detail_ws->label_unduh_4]);
        $files_download = array_filter([$detail_ws->file_unduh_3,$detail_ws->file_unduh_4]);
        return view ('user.detail-kegiatan',[
            "ws" => $detail_ws,
            "title" => $detail_ws->title,
            "label_upload" => $label_upload,
            "label_download" => $label_download,
            "files_download" => $files_download,
            "count" => $count
        ]);
    }

    

    
}
