<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Models\UserClass;
use App\Models\UserTask;

class MaterialController extends Controller
{
    
    public function adminViewCreateMaterial($ws_id){

        return view ('admin.tambah_materi',[
            'title' => 'Milea Admin | Tambah Materi',
            'ws_id' => $ws_id
        ]);
    }

    public function adminStoreCreateMaterial(Request $request){


        $get_ml = $request->material_label;
        $get_mf = $request->material_file;

        foreach ($get_mf as $index => $value){

            $get_mf[$index] = time().rand(100,999).".".$value->getClientOriginalExtension();

            DB::table('materials')->insert([
                'ws_id' => $request->ws_id,
                'material_label' => $get_ml[$index],
                'material_file' => $get_mf[$index]
            ]);

            $value->move(public_path().'/materi', $get_mf[$index]); 
            // $value->move(public_path('materi/'.$get_mf[$index])); 
            
        }
        
            return redirect('/admin/pelatihan/'.$request->ws_id);
    }

    public function adminDeleteCreateMaterial($id){

        $mf_file = DB::table('materials')
                    ->where('materials.id', $id)
                    ->select('materials.material_file')->first();

        // return dd($mf_file->material_file);
        Material::find($id)->delete();

        File::delete(public_path().'/materi/'.$mf_file->material_file);

        return redirect('/admin/pelatihan');
    }

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
            ->select('id')->first();
        
        if($data == null){
            $id = null;
        }else{
            $id = $data->id;
            $count_duplicate = DB::table('user_classes')
            ->where([['ws_id','=',$id],['user_id','=', $user_id]])
            ->count();
    
            $check_verif = DB::table('submissions')
                    ->where('user_id', $user_id)
                    ->where('ws_id', $id)
                    ->where('status_p', 'Diterima') 
                    ->count();
        }
       


        if($id!=null && $count_duplicate === 0 && $check_verif>0){
            DB::table('user_classes')->insert([
                "ws_id" => $id,
                "user_id" => $user_id]);
            return redirect()->route('class-detail',['key'=>$key])->with('success','Anda Berhasil Masuk ke Kelas!');
            }else{
                if($id == null){
                    return redirect('/kelas')->with('warning','Kode yang anda masukkan salah!');
                }
                if($count_duplicate > 0){
                    return redirect('/kelas')->with('warning','Anda telah berada di dalam kelas tersebut!');
                }
                if($check_verif<=0){
                    return redirect('/kelas')->with('warning','Anda belum mendaftar atau pendaftaran anda belum diverifikasi!');
                }
                
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
                    $data_material = DB::table('workshops')
                    ->where('workshops.id', $ws->id)
                    ->join('materials', 'workshops.id', '=', 'materials.ws_id')
                    ->select('materials.*','workshops.title', 'workshops.open_ws', 'workshops.close_ws', 'workshops.place')
                    ->orderBy('materials.created_at', 'DESC')
                    ->get();

                    $data_task = DB::table('workshops')
                    ->where('workshops.id', $ws->id)
                    ->join('tasks', 'workshops.id', '=', 'tasks.ws_id')
                    ->select('tasks.task_title','tasks.task_title_slug','tasks.created_at','workshops.key')
                    ->orderBy('tasks.created_at', 'DESC')
                    ->get();

                    $check_task_file = DB::table('user_tasks')
                    ->where([['ws_id','=',$ws->id],['user_id','=', $user_id]])
                    ->count();

                    return view ('user.detail_kelas', [
                        'data_ws'=> $ws,
                        'count'=> $check_task_file,
                        'data_material' => $data_material,
                        'data_tasks' => $data_task,
                    ]);
                    
                }else{

                    return view ('user.detail_kelas', [
                        'data_ws'=> $ws,
                        'data_material' => null,
                    ]);
                    
                
                }
            }
    }


    public function taskDetail($key, $slug){
        $user_id = Auth::user()->id;
        $ws = DB::table('workshops')
                    ->where('key', $key)
                    ->select('id')->first();
        $check = DB::table('user_classes')
                ->where([['ws_id','=',$ws->id],['user_id','=', $user_id]])
                ->count();

        if($check<=0){
            return redirect('/kelas')->with('warning','Anda belum tergabung di kelas ini!');
        }else{
            $data_task = DB::table('tasks')
                        ->where('task_title_slug', $slug)->first();

            $task_file = DB::table('user_tasks')
            ->select('id','task_file', 'created_at')
            ->where([['ws_id','=',$ws->id],['user_id','=', $user_id]])
            ->first();
            $check_task_file = DB::table('user_tasks')
            ->where([['ws_id','=',$ws->id],['user_id','=', $user_id]])
            ->count();
           
            
            return view ('user.tugas', [
                'task' => $data_task,
                'task_file' => $task_file,
                'count' => $check_task_file,
                'ws_id' => $ws->id,
                'user_id' => $user_id,
                'key' => $key
            ]);
        }
    }

    public function taskPost($key, $id, Request $request){

        $request->validate([
            'task_file' => 'max:2048',
        ]);

        $user_id = Auth::user()->id;

        $ws_id = $request->ws_id;
        $get_file = $request->task_file;
        $filename = "tugas".time().rand(100,999).".".$get_file->getClientOriginalExtension();

        DB::table('user_tasks')->insert([
            'ws_id' => $ws_id,
            'user_id' => $user_id,
            'task_file' => $filename,
        ]);

        $get_file->move('user/tugas/',$filename);

        return back()->with('success','Tugas Berhasil Dikirim!');

        
    }

    public function deleteTask($id){
        $task_file = DB::table('user_tasks')
        ->select('id','task_file')
        ->where('id','=', $id)
        ->first();
        UserTask::find($id)->delete();
        File::delete(public_path('/user/tugas/'.$task_file->task_file));
  
        return back()->with('success','Tugas Berhasil Dihapus!');

        
    }

    public function deleteClass($id){
        
        UserClass::find($id)->delete();
  
        return back()->with('success','Anda Berhasil Keluar dari Kelas!');
    } 

}