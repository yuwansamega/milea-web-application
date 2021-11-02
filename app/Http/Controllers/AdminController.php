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
}