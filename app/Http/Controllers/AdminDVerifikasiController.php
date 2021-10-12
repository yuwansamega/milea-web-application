<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Workshop;
use App\Models\DataUser;
use Illuminate\Support\Facades\DB;

class AdminDVerifikasiController extends Controller
{
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

    public function index(Submission $data_sub_id){

        $sub_id = $data_sub_id->id;
        // $data_sub = Submission::where('user_id', $id)->first();
        
        $data = DB::table('submissions')
            ->where('submissions.id', $sub_id)
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
            ->select('submissions.file_1', 'submissions.file_2', 'submissions.file_3', 'submissions.status_p',  'workshops.title', 'workshops.label_upload_1','workshops.label_upload_2', 'workshops.label_upload_3','data_users.*' )
            ->first();
        
        $data->birth_date = $this->tgl_indo($data->birth_date);
        $user_upload = array_filter([
            array_filter([
            "label" => $data->label_upload_1,
            "file" => $data->file_1]),
            array_filter([
            "label" => $data->label_upload_2,
            "file" => $data->file_2]),
            array_filter([
            "label" => $data->label_upload_3,
            "file" => $data->file_3])]);

        return view ('admin.verification-detail', [
            "data" => $data,
            "subm_id" => $sub_id,
            "user_upload" => $user_upload
            
        ]);

        //return dd($user_upload);

       
    }
    public function update(Request $request, $data_sub_id){

        // $sub_id = $data_sub_id->id;

        // return dd($data_sub_id);
        DB::table('submissions')
        ->where('id', $data_sub_id)
        ->update(['status_p' => $request->status_p,
                'message' => $request->message]);

        return redirect('/admin/verifikasi')->with('success', 'Status berhasil diperbarui');


    }
}