<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;

class AdminVerifikasiController extends Controller
{
    public function index(){

        // $data_submission = Submission::all();
        // $user_id_sub = $data_submission->user_id;
        // $ws_id_sub = $data_submission->ws_id;
        // $data_ws = Workshop::where('ws_id', $ws_id_sub)->first();
        // $data_user = DataUser::where('user_id', $user_id_sub)->first();

        $data = DB::table('submissions')
            // ->where(function ($query) {
            //     $query->where('submissions.status_p', 'Menunggu Verifikasi')
            //           ->orWhere('submissions.status_p', 'Diterima');
            // })
            ->Where(function ($query) {
                $query->where('submissions.payment_status', 'Belum Dikirim')
                      ->orWhere('submissions.payment_status', 'Menunggu Verifikasi Pembayaran')
                      ->orWhere('submissions.payment_status', 'Pembayaran Belum Diterima');
            })
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
            ->select('data_users.fullname', 'data_users.nik', 'workshops.title', 'submissions.id', 'submissions.status_p', 'submissions.payment_status')
            // ->orderBy('status_p', 'asc')
            ->latest('submissions.created_at')->get();
        
        
        return view ('admin.verifikasi', [
            "data_sub" => $data,
            "title" => "Milea Admin | Verifikasi"
        ]);
        
    }
}