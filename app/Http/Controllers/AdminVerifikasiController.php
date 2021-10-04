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
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->join('workshops', 'submissions.ws_id', '=', 'workshops.id')
            ->select('data_users.fullname', 'data_users.nik', 'workshops.title', 'submissions.id', 'submissions.status')
            ->latest('submissions.created_at')->get();
            // ->get();
        
        return view ('admin.verifikasi', [
            "data_sub" => $data
        ]);
        
    }
}