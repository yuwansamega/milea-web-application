<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Submission;
use App\Models\DataUser;
use App\Models\Workshop;


class SubmissionController extends Controller
{
    public function store_by_id(Request $request, $id){
        $user_id = Auth::user()->id;


        //Cek user apakah sudah daftar atau belum
        $count = DB::table('submissions')
                ->where('user_id', $user_id)
                ->where('ws_id', $id)
                ->where('status_p', 'Menunggu Verifikasi') 
                ->count();
        
        $check_nik = DB::table('data_users')
                ->where('user_id', $user_id)
                ->first();

        if($check_nik->nik === ""){

            return redirect('/lengkapi-profil')->with('warning','Anda belum melengkapi profil untuk mendaftar pelatihan');
        
        }
        else{
            if($count===0){
                $request->validate([
                    'file_1' => 'mimes:pdf|max:2048',
                    'file_2' => 'mimes:pdf|max:2048',
                    'file_3' => 'mimes:pdf|max:2048'
                ]);
                $fileStore = array_filter([$request->file_1,$request->file_2,$request->file_3]);
                $i = 0;
                    foreach($fileStore as $store){
                        $fileName[$i++] = time().rand(100,999).".".$store->getClientOriginalExtension();
                    } 
                $post_data_subs = array("user_id"=>$user_id,
                                    "ws_id"=>$id,
                                    );
        
                if ($request->file_1 !== null){
                    $request->file_1->move(public_path().'/user/berkas/unduh', $fileName[0]);
                    $post_data_subs["file_1"]=$fileName[0];
            
                }
                if ($request->file_2 !== null){
                    $request->file_2->move(public_path().'/user/berkas/unduh', $fileName[1]);
                    $post_data_subs["file_2"]=$fileName[1];
                }
                if ($request->file_3 !== null){
                    $request->file_3->move(public_path().'/user/berkas/unduh', $fileName[2]);
                    $post_data_subs["file_3"]=$fileName[2];
                }
                $post_data_subs["created_at"]=date('Y-m-d H:i:s');
                $post_data_subs["updated_at"]=date('Y-m-d H:i:s');
                DB::table('submissions')->insert($post_data_subs);
        
                return redirect('/riwayat')->with('success','Anda Berhasil Daftar Pelatihan! Silakan tunggu hasil verifikasi dari pihak RSUD Siti Fatimah');
            }elseif($count>0){
                return redirect('/riwayat')->with('warning','Anda telah mendaftar pelatihan ini dan masih menunggu verifikasi dari pihak RSUD Siti Fatimah ');
            }
        }

    }
    
    function tgl_indo($tanggal){
        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tahun
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tanggal
     
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    public function riwayat(){
        $user_id = Auth::user()->id;
       

        $data = DB::table('submissions')
        ->where('user_id',$user_id)
        ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
        ->select( 'submissions.id','submissions.status_p','submissions.message',  'workshops.title', 'workshops.open_ws', 'workshops.close_ws','workshops.place','submissions.created_at' )
        ->orderByDesc('submissions.created_at')
        ->paginate(10);
    
        $count =DB::table('submissions')->where('user_id',$user_id)->count();

        return view('user.riwayat', [
            "riwayat_user" => $data,
            "title" => "Riwayat Pelatihan",
            "count" =>$count
        ]);
    }
}
