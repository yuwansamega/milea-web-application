<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WSController extends Controller
{
    public function index(){
        $ws = DB::table('workshops')->paginate(10);
        $count = DB::table('workshops')->count();
        return view ('daftar-kegiatan',[
            "workshops" => $ws,
            "title" => "Daftar Kegiatan",
            "count" => $count
        ]);
    }
    public function indexAdmin(){

        $ws = DB::table('workshops')->get();
        return view ('admin.pelatihan', [
            "ws" => $ws
        ]);
    }
    public function indexAdminTambah(){

        return view ('admin.create_pelatihan');
    }

    public function delete($id){
    
        // return "Test";
        Workshop::where('id', $id)->delete();
        return redirect('/admin/pelatihan')->with('toast_success','Pelatihan Berhasil Dihapus');
    }
    public function detail($id){
        
        $detail_ws = Workshop::where('id',$id)->first();
        $count = DB::table('workshops')->count();
        $label_upload = array_filter([$detail_ws->label_upload_1,$detail_ws->label_upload_2,$detail_ws->label_upload_3]);
        $label_download = array_filter([$detail_ws->label_unduh_1,$detail_ws->label_unduh_2,$detail_ws->label_unduh_3,$detail_ws->label_unduh_4]);
        $files_download = array_filter([$detail_ws->file_unduh_3,$detail_ws->file_unduh_4]);
        return view ('detail-kegiatan',[
            "ws" => $detail_ws,
            "title" => $detail_ws->title,
            "label_upload" => $label_upload,
            "label_download" => $label_download,
            "files_download" => $files_download,
            "count" => $count
        ]);
    }

    

    public function store(Request $request){
        
        $request->validate([
            'file_unduh_3' => 'mimes:pdf|max:2048',
            'file_unduh_4' => 'mimes:pdf|max:2048'
        ]);

        Workshop::create([
            'open_regist' => $request->open_regist,
            'close_regist' => $request->close_regist,
            'open_ws' => $request->open_ws,
            'close_ws' => $request->close_ws,
            'title' => $request->title,
            'quota' => $request->quota,
            'place' => $request->place,
            'cp' => $request->cp,
            'describe' => $request->describe,
            'criteria' => $request->criteria,
            'label_upload_1' => $request->label_upload_1,
            'label_upload_2' => $request->label_upload_2,
            'label_upload_3' => $request->label_upload_3,
            'label_unduh_1' => $request->label_unduh_1,
            'label_unduh_2' => $request->label_unduh_2,
            'label_unduh_3' => $request->label_unduh_3,
            'label_unduh_4' => $request->label_unduh_4,
            'file_unduh_3' => $request->file_unduh_3,
            'file_unduh_4' => $request->file_unduh_4
        ]);

        return redirect('/admin/pelatihan')->with('success','Pelatihan Berhasil Ditambahkan');
        
    }
}