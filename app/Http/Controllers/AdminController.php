<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    

    public function index(){

        $sub_count = DB::table('submissions')->count();
        $datau_count = DB::table('data_users')->count();
        $work_count = DB::table('workshops')->count();
        
        return view ('admin.dashboard',[
            "title" => "Milea Admin | Dashboard",
            "sub" => $sub_count,
            "datau" => $datau_count,
            "work" => $work_count
        ]);
    }
    
    public function showAdd(){
        
        return view ('admin.tambah_materi',[
            "title" => "Milea Admin | Dashboard"
        ]);
    }

    public function storeMaterial(Request $request){
        $request->validate([
            'material_file' => 'max:4096'
        ]);
        $coba_label= $request->material_label;
        $coba_file= $request->material_file;
        
        return dd($coba_label, $coba_file);
        
}
}