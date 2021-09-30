<?php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use App\Models\Submission;

class AdminVerifikasiController extends Controller
{
    public function index(){

        $data_submission = Submission::all();
        $user_id = $data_submission->user_id;
        $data_user = DataUser::where('user_id', $user_id)->first();
        return view ('admin.verifikasi', [

        ]);
        
    }
}