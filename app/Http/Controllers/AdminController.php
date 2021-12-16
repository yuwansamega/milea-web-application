<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    

    public function index(){

        $sub_count = DB::table('submissions')
        ->where(function ($query) {
            $query->where('submissions.status_p', 'Menunggu Verifikasi')
                  ->orWhere('submissions.status_p', 'Diterima');
        })
        ->Where(function ($query) {
            $query->where('submissions.payment_status', 'Belum Dikirim')
                  ->orWhere('submissions.payment_status', 'Menunggu Verifikasi Pembayaran')
                  ->orWhere('submissions.payment_status', 'Pembayaran Belum Diterima');
        })
        ->count();

        
        $datau_count = DB::table('data_users')->count();
        $work_count = DB::table('workshops')->count();
        
        return view ('admin.dashboard',[
            "title" => "Milea Admin | Dashboard",
            "sub" => $sub_count,
            "datau" => $datau_count,
            "work" => $work_count
        ]);
    }
    


}