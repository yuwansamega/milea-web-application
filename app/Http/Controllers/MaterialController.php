<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Material;
use App\Models\UserClass;

class MaterialController extends Controller
{
    public function show (){
        $user_id = Auth::user()->id;

        $data = DB::table('user_classes')
            ->where('user_id', $user_id)
            ->join('workshops', 'user_classes.ws_id', '=', 'workshops.id')
            ->select('user_classes.id','workshops.title', 'workshops.open_ws', 'workshops.close_ws', 'workshops.place', 'workshops.key')
            ->get();
        
        $count=count($data);
        
        return view ('user.kelas',[
            "data" => $data,
            "title" => "Kelas Saya",
            "count" => $count
        ]);
    }

    public function check (Request $request){
        $user_id = Auth::user()->id;
        $key = $request->key;

        $data = DB::table('workshops')
            ->where('key', $key)
            ->select('id')->get();
        
        $id = $data->first()->id;

        $count = DB::table('workshops')
            ->where('key', $key)
            ->count();

        $count_duplicate = DB::table('user_classes')
        ->where([['ws_id','=',$id],['user_id','=', $user_id]])
        ->count();

        if($count>0 && $count_duplicate === 0){
            DB::table('user_classes')->insert([
                "ws_id" => $id,
                "user_id" => $user_id]);
            return redirect()->route('class-detail',['key'=>$key])->with('success','Anda Berhasil Masuk ke Kelas!');
            }else{
                return redirect('/kelas')->with('warning','Kode yang anda masukkan salah atau anda telah berada di dalam kelas tersebut!');
            }
        
    }

    public function classDetail($key){


        $user_id = Auth::user()->id;
        $ws = DB::table('workshops')
                    ->where('key', $key)
                    ->select('title','open_ws','close_ws','place','id')->first();
        $check = DB::table('user_classes')
                ->where([['ws_id','=',$ws->id],['user_id','=', $user_id]])
                ->count();

        
        if($check<=0){
            return redirect('/kelas')->with('warning','Anda belum tergabung di kelas ini!');
        }else{
            $check_material = DB::table('user_classes')
                ->where('ws_id',$ws->id)
                ->count();

                if($check_material>0){
                    $data = DB::table('workshops')
                    ->where('workshops.id', $ws->id)
                    ->join('materials', 'workshops.id', '=', 'materials.ws_id')
                    ->select('materials.*','workshops.title', 'workshops.open_ws', 'workshops.close_ws', 'workshops.place')
                    ->orderBy('materials.created_at', 'DESC')
                    ->get();

                    return view ('user.detail_kelas', [
                        'data_ws'=> $ws,
                        'data_material' => $data,
                    ]);
                    
                }else{

                    return view ('user.detail_kelas', [
                        'data_ws'=> $ws,
                        'data_material' => null,
                    ]);
                    
                
                }
            }
    }

    public function deleteClass($id){
        
        UserClass::find($id)->delete();
  
        return back()->with('success','Anda Berhasil Keluar dari Kelas!');
    } 
}