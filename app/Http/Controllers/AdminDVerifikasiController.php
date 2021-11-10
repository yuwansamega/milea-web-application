<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Workshop;
use App\Models\DataUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
            "user_upload" => $user_upload,
            "title" => "Milea Admin | Verifkasi - Detail"
            
        ]);

        //return dd($user_upload);

       
    }

    public function indexDetailPayment (Submission $data_sub_id){

        $sub_id = $data_sub_id->id;

        $data = DB::table('submissions')
            ->where('submissions.id', $sub_id)
            ->select('submissions.payment_proof', 'submissions.payment_status', 'submissions.id')
            ->first();

        return view ('admin.verification_payment', [
            'title' => 'Milea Admin | Verification Payment',
            'data' => $data
        ]);
    }

    public function update(Request $request, $data_sub_id){
        
        DB::table('submissions')
        ->where('id', $data_sub_id)
        ->update(['status_p' => $request->status_p,
        'message' => $request->message]);

        $data = DB::table('submissions')
            ->where('submissions.id', $data_sub_id)
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
            ->select('submissions.status_p', 'workshops.key',  'workshops.title', 'workshops.cp','data_users.fullname', 'data_users.email' )
            ->first();
        
        
        if($request->status_p === "Diterima"){
            $mail = [
                'title' => 'Hasil Verifikasi Pendaftaran Pelatihan di MILEA RSUD Siti Fatimah Sumsel',
                'body' => 'Selamat <b>'.$data->fullname.'</b>, anda <b>DITERIMA</b> mengikuti <b>'. $data->title.'</b>. Silakan lakukan pembayaran dan mengunggah bukti pembayaran di akun MILEA anda. Hubungi narahubung: <b>('.$data->cp.')</> untuk informasi lebih lanjut.'
                ];
                
                Mail::to($data->email)->send(new \App\Mail\MyTestMail($mail));

        }

        if($request->status_p === "Ditolak"){
            $mail = [
                'title' => 'Hasil Verifikasi Pendaftaran Pelatihan di MILEA RSUD Siti Fatimah Sumsel',
                'body' => 'Maaf <b>'.$data->fullname.'</b>, anda <b>DITOLAK</b> mengikuti <b>'. $data->title.'.</b> Silakan hubungi narahubung: <b>('.$data->cp.')</b> untuk informasi lebih lanjut.'
                ];
                
                Mail::to($data->email)->send(new \App\Mail\MyTestMail($mail));

        }

        return redirect('/admin/verifikasi')->with('success', 'Status berhasil diperbarui & pendaftar telah menerima email!');
        

    }

    public function updateDetailPayment(Request $request, $sub_id){

        DB::table('submissions')
        ->where('id', $sub_id)
        ->update(['payment_status' => $request->payment_status]);
        
        $data = DB::table('submissions')
            ->where('submissions.id', $sub_id)
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
            ->select('submissions.payment_status', 'workshops.key',  'workshops.title', 'workshops.cp','data_users.fullname', 'data_users.email' )
            ->first();

            if($request->payment_status  === "Pembayaran Diterima"){
                $mail = [
                    'title' => 'Hasil Verifikasi Pendaftaran Pelatihan di MILEA RSUD Siti Fatimah Sumsel',
                    'body' => 'Selamat <b>'.$data->fullname.'</b>, pembayaran anda telah <b>DITERIMA</b>. Selamat mengikuti <b>'. $data->title.'. </b> Kode Kelas : <b>'.$data->key.'</b>. Silakan hubungi narahubung: <b>('.$data->cp.')</b> untuk informasi lebih lanjut.'
                    ];
                    
                    Mail::to($data->email)->send(new \App\Mail\MyTestMail($mail));
    
            }
    
            if($request->payment_status === "Pembayaran Belum Diterima"){
                $mail = [
                    'title' => 'Hasil Verifikasi Pendaftaran Pelatihan di MILEA RSUD Siti Fatimah Sumsel',
                    'body' => 'Maaf <b>'.$data->fullname.'</b>, pembayaran anda untuk '.$data->title.'<b> belum diterima.</b> Silakan hubungi narahubung: <b>('.$data->cp.')</b> untuk informasi lebih lanjut.'
                    ];
                    
                    Mail::to($data->email)->send(new \App\Mail\MyTestMail($mail));
    
            }
            return redirect('/admin/verifikasi')->with('success', 'Status pembayaran berhasil diperbarui & pendaftar telah menerima email!');
        
    }
}