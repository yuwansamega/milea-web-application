<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DataUser;
use Image;
use App\Models\User;


class DataUserController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        return view ('user.data-profil',[
            "data_user" => DataUser::where('user_id',$user_id)->first(),
            "title" => "Profil Diri"
        ]);
    }
    public function show (){
        $user_id = Auth::user()->id;
        
        return view ('user.lengkapi-profil',[
            "data_user" => DataUser::where('user_id',$user_id)->first(),
            "rank_level"=> ['-','I A/Juru Muda','I B/Juru Muda Tingkat 1','I C/Juru','I D/Juru Tingkat 1','II A/Pengatur Muda','II B/Pengatur Muda Tingkat 1','II C/Pengatur','II D/Pengatur Tingkat 1','III A/Penata Muda','III B/Penata Muda Tingkat 1','III C/Penata','III D/Penata Tingkat 1','IV A/Pembina','IV B/Pembina Tingkat 1','IV C/Pembina Utama Muda','IV D/Pembina Utama Madya','IV E/Pembina Utama'],
            "title" => "Lengkapi Data Diri"
        ]);
    }

    public function update(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $data_user = DataUser::select('image')->where('user_id', $user_id)->first();
        $request->validate([
            'image' => 'mimes:jpg,png|max:2048'
        ]);
        if($request->hasFile('image')){
            $profile_image = $request->file('image');
            $filename = time(). '.' .$profile_image->getClientOriginalExtension();
            Image::make($profile_image)->resize(600,800)->save(public_path('/user/ava/'.$filename));
        }else{
            $filename = $data_user->image;
        }
        DB::table('data_users')
              ->where('id', $id)
              ->update(['fullname'=>$request->fullname,
                        'image' => $filename,
                        'nip' => $request->nip,
                        'nik' => $request->nik,
                        'status' => $request->status,
                        'gender' => $request->gender,
                        'birth_place' => $request->birth_place,
                        'birth_date' => $request->birth_date,
                        'address' => $request->address,
                        'religion' => $request->religion,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'edu' => $request->edu,
                        'level' => $request->level,
                        'position' => $request->position,
                        'institute' => $request->institute,
                        'institute_addr' => $request->institute_addr,
                        'institute_phone' => $request->institute_phone
            ]);
        return redirect('data-profil')->with('success', 'Data Diri Berhasil Disimpan!');
    }
}