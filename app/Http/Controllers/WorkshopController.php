<?php

namespace App\Http\Controllers;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    public function index(){

        return view ('admin.create_pelatihan');
    }

    public function delete($id){
        return "test";
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

        return redirect('/admin/dashboard')->with('success','Pelatihan Berhasil Ditambahkan');
        
    }
}