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

    public function store_by_id(Request $request, $id){
        $user_id = Auth::user()->id;

        $count = DB::table('submissions')
                ->where('user_id', $user_id)
                ->where('ws_id', $id)
                ->where('status', 'Menunggu Verifikasi') 
                ->count();

        if($count===0){
            $request->validate([
                'file_1' => 'mimes:pdf|max:2048',
                'file_2' => 'mimes:pdf|max:2048',
                'file_3' => 'mimes:pdf|max:2048'
            ]);
            $fileStore = array_filter([$request->file_1,$request->file_2,$request->file_3]);
            $i = 0;
                foreach($fileStore as $store){
                    $fileName[$i++] = time().'.'.$store->extension();
                } 
            $post_data_subs = array("user_id"=>$user_id,
                                "ws_id"=>$id,
                                );
    
            if ($request->file_1 !== null){
                $request->file_1->move(public_path('/user/berkas/'.$fileName[0]));
                $post_data_subs["file_1"]=$fileName[0];
        
            }
            if ($request->file_2 !== null){
                $request->file_2->move(public_path('/user/berkas/'.$fileName[1]));
                $post_data_subs["file_2"]=$fileName[1];
            }
            if ($request->file_3 !== null){
                $request->file_3->move(public_path('/user/berkas/'.$fileName[2]));
                $post_data_subs["file_3"]=$fileName[2];
            }
            $post_data_subs["created_at"]=date('Y-m-d H:i:s');
            $post_data_subs["updated_at"]=date('Y-m-d H:i:s');
            DB::table('submissions')->insert($post_data_subs);
      
            return back()->with('success','Anda Berhasil Daftar Pelatihan! Silakan tunggu hasil verifikasi dari pihak RSUD Siti Fatimah');
        }elseif($count>0){
            return back()->with('warning','Anda telah mendaftar pelatihan ini dan masih menunggu verifikasi dari pihak RSUD Siti Fatimah ');
        }
    }
}
