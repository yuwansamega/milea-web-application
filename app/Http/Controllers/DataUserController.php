<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DataUser;
use Image;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\PseudoTypes\False_;
use PhpParser\Node\Stmt\Echo_;

class DataUserController extends Controller
{
    public function index(){
        $user_id = Auth::user()->id;
        return view ('user.data-profil',[
            "data_user" => DataUser::where('user_id',$user_id)->first(),
            "title" => "Profil Diri"
        ]);
    }

    public function indexAdmin(){
        
        return view ('admin.account',[
            "user" => User::all(),
            "title" => "Akun Pengguna"
        ]);
    }

    public function updateAccShow($id){
        
        return view ('admin.update-acc',[
            "user" => DB::table('data_users')->where('user_id',$id)->first(),
            "title" => "Akun Pengguna"
        ]);
    }
    public function updateAcc($id, Request $request){
        $request->validate([
            "new_pass"  => "required | min:8",
            "confirm_pass" => "same:new_pass",
        ]);
        $new_pass = Hash::make($request->new_pass);
        DB::table('users')
              ->where('id', $id)
              ->update(['password' => $new_pass,
            ]);

            return redirect()->back()->with("success","Password telah diubah!");
    }
    public function deleteAcc($id){
        DB::table('users')
                    ->where('id', $id)
                    ->delete();
        DB::table('data_users')
                    ->where('user_id', $id)
                    ->delete();
        return redirect()->back()->with("success","Akun sudah dihapus!");
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
            if($data_user->image !== 'user.png'){
                File::delete(public_path('/user/ava/'.$data_user->image));
            }
            
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

        DB::table('users')
              ->where('id', $user_id)
              ->update(['email' => $request->email,
            ]);
        return redirect('data-profil')->with('success', 'Data Diri Berhasil Disimpan!');
    }
    public function show_change_password (){
        $user_id = Auth::user()->id;
        
        return view ('user.ubah_pass'
        ,[
            "data_user" => DataUser::where('user_id',$user_id)->first(),
            "title" => "Lengkapi Data Diri"
        ]);
    }
    public function update_password(Request $request){
        $request->validate([
            "email"     => "required|email",
            "old_pass"  => "required",
            "new_pass"  => "required | min:8",
            "confirm_pass" => "same:new_pass",
        ]);
        
        if (Hash::check($request->old_pass, Auth::user()->password)===false) {
            // The passwords matches
            return redirect()->back()->with("toast_error","Password yang anda masukkan tidak sesuai!");
            }
        if ($request->email != Auth::user()->email) {
            return redirect()->back()->with("toast_error","Email yang anda masukkan tidak sesuai!");
        }
             
            //Change Password
            $user = Auth::user();
            $user->password = Hash::make($request->new_pass);
            $user->save();
             
            return redirect()->back()->with("success","Password telah diubah!");
        
       
    }
}