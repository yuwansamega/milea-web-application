<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use ZipArchive;



class TaskController extends Controller
{
    
    public function adminViewCreateTask ($ws_id){

        return view ('admin.tambah_tugas',[
            'title' => 'Milea Admin | Tambah Tugas',
            'ws_id' => $ws_id
        ]);

    }

    public function adminStoreCreateTask (Request $request){
        $request->validate([
            'task_file' => 'max:2048',
        ]);

        $get_tf = $request->task_file;
        $task_file = rand(10,99)."".$get_tf->getClientOriginalName();

        $title_slug = Str::slug($request->task_title, "-");

        DB::table('tasks')
            ->insert([
                'ws_id' => $request->ws_id,
                'speaker' => $request->speaker,
                'task_title' => $request->task_title,
                'task_title_slug' => $title_slug,
                'task_desc' => $request->task_desc,
                'deadline' => $request->deadline,
                'dead_time' => $request->dead_time,
                'task_file' => $task_file
                
            ]);
        $task_id = DB::table('tasks')
            ->where('task_file', $task_file)
            ->select('id')
            ->first();
            
            $path = public_path().'/user/tugas/'.$request->speaker.'-'.$task_id->id;
            File::makeDirectory($path, $mode = 0777, true, true);

            $get_tf->move(public_path().'/admin/tugas', $task_file); 
            return redirect('/admin/pelatihan/'.$request->ws_id)->with('success','Tugas Berhasil Ditambah');
    }

    public function adminDeleteCreateTask($id){

        $task = DB::table('tasks')
                    ->where('tasks.id', $id)
                    ->select('tasks.task_file', 'tasks.speaker')->first();

        DB::table('user_tasks')
                ->where('task_id', $id)
                ->delete();    

        Task::find($id)->delete();
        
        File::delete(public_path().'/admin/tugas/'.$task->task_file);
        
        File::deleteDirectory(public_path().'/user/tugas/'. $task->speaker.'-'.$id);
        File::delete(public_path().'/zip/'.$task->speaker.'.zip');

        return back()->with('success','Tugas Berhasil Dihapus!');
    }

    public function adminViewParticipantTask($id){
        
        $ut_tns = DB::table('user_tasks')
                    ->where('user_tasks.task_id', $id)
                    ->join('tasks', 'user_tasks.task_id', '=', 'tasks.id')
                    ->select('tasks.speaker', 'tasks.task_title')
                    ->first();
        $ws_title = DB::table('tasks')
                ->where('tasks.id', $id)
                ->join('workshops', 'tasks.ws_id', '=', 'workshops.id')
                ->select('workshops.title')
                ->first();
                    
                    
        $data_ut = DB::table('user_tasks')
                    ->where('user_tasks.task_id', $id)
                    ->join('data_users', 'user_tasks.user_id', '=', 'data_users.user_id')
                    ->select('data_users.fullname', 'user_tasks.task_file', 'user_tasks.task_id')
                    ->get();

       
        return view ('admin.tugas_peserta',[
            'title' => 'Milea Admin | Tugas Peserta',
            'ut_tns' => $ut_tns,
            'ws_title'=> $ws_title,
            'data_ut' => $data_ut,
            'task_id' => $id
        ]);
        
    }

    public function adminUnduhParticipantTask($id){
        
        $data_t = DB::table('tasks')
                    ->where('id', $id)
                    ->select('speaker')
                    ->first();

        $zip = new ZipArchive;
        $filename = $data_t->speaker.'.zip';
        if($zip->open(public_path('zip/'.$filename),ZipArchive::CREATE) === TRUE){
            
            $files = File::files(public_path('user/tugas/'.$data_t->speaker));

            foreach($files as $key => $value){
                $relativeName = basename($value);
                $zip->addFile($value, $relativeName);
            }

            $zip->close();

            
        }
        return response()->download(public_path('zip/'.$filename));
        // return response()->download(public_path($filename));
    }
}