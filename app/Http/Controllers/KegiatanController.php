<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index (){

        return view ('daftar-kegiatan',[
            "user" => Auth::user(),
            "rank_level"=> ['II A/Pengatur Muda','II B/Pengatur Muda Tingkat 1','II C/Pengatur','II D/Pengatur Tingkat 1','III A/Penata Muda','III B/Penata Muda Tingkat 1','III C/Penata','III D/Penata Tingkat 1','IV A/Pembina','IV B/Pembina Tingkat 1','IV C/Pembina Utama Muda','IV D/Pembina Utama Madya','IV E/Pembina Utama'],
            "title" => "Daftar Kegiatan"
        ]);
    }
}
