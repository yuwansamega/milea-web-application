<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class WSController extends Controller
{
    public function index(){
        $ws = DB::table('workshops')->paginate(10);
        $count = DB::table('workshops')->count();
        return view ('user.daftar-kegiatan',[
            "workshops" => $ws,
            "title" => "Daftar Kegiatan",
            "count" => $count
        ]);
    }
    public function indexAdmin(){

        $ws = DB::table('workshops')->latest()->get();
        return view ('admin.pelatihan', [
            "ws" => $ws,
            "title" => "Milea Admin | Pelatihan"
        ]);
    }
    public function indexAdminTambah(){

        return view ('admin.create_pelatihan',[
            "title" => "Milea Admin | Pelatihan - Tambah"
        ]);
    }

    public function delete($id){
        DB::table('submissions')
                ->where('ws_id', $id)
                ->delete(); 
        Workshop::where('id', $id)->delete();   
        return redirect('/admin/pelatihan')->with('toast_success','Pelatihan Berhasil Dihapus');
    }

    public function indexUpdate(Workshop $data_ws_id){

        $ws_id = $data_ws_id->id;

        $data = Workshop::find($ws_id);

        return view ('admin.pelatihan_update', [

            'data' => $data,
            "title" => "Milea Admin | Pelatihan - Perbarui"

        ]);
    }

    public function indexWorkshopSub ($ws_id){

        $data_material = DB::table('materials')
            ->where('materials.ws_id', $ws_id)
            ->get();

        $data_task = DB::table('tasks')
            ->where('tasks.ws_id', $ws_id)
            ->get();

        $data = DB::table('submissions')
            ->where('submissions.ws_id', $ws_id)
            ->Where('submissions.payment_status', 'Pembayaran Diterima')
            ->join('data_users', 'submissions.user_id', '=', 'data_users.user_id')
            ->select('data_users.fullname', 'data_users.position')
            ->get();
            
        $data_ws = Workshop::find($ws_id); 
            
        return view('admin.pelatihan_submissions', [
            'data_material' => $data_material,
            'data_task' => $data_task,
            "ws_id" => $ws_id,
            'data' => $data,
            'data_ws' => $data_ws,
            'title' => 'Milea Admin | Pelatihan - Pengajuan'
        ]);
        
    }

    public function update(Request $request, $ws_id){

        DB::table('workshops')
        ->where('id', $ws_id)
        ->update([
            'open_regist'=>$request->open_regist,
            'close_regist'=>$request->close_regist,
            'open_ws'=>$request->open_ws,
            'close_ws'=>$request->close_ws,
            'title'=>$request->title,
            'describe'=>$request->describe,
            'place'=>$request->place,
            'quota'=>$request->quota,
            'cp'=>$request->cp,
            'criteria'=>$request->criteria
        ]);

        return redirect('admin/pelatihan')->with('success', 'Pelatihan Berhasil Diperbarui');
    }

    public function detail($id){
        $name = Auth::user()->name;
        
        $detail_ws = Workshop::where('id',$id)->first();
        $count = DB::table('workshops')->count();
        $label_upload = array_filter([$detail_ws->label_upload_1,$detail_ws->label_upload_2,$detail_ws->label_upload_3]);
        $unduh = array_filter([
            array_filter(["file" => $detail_ws->label_unduh_1,"label" => $detail_ws->label_unduh_1]),
            array_filter(["file" => $detail_ws->label_unduh_2,"label" => $detail_ws->label_unduh_2]),
            array_filter(["file" => $detail_ws->file_unduh_3,"label" => $detail_ws->label_unduh_3]),
            array_filter(["file" => $detail_ws->file_unduh_4,"label" => $detail_ws->label_unduh_4])]);        
  
        return view ('user.detail-kegiatan',[
            "name" => $name,
            "ws" => $detail_ws,
            "title" => $detail_ws->title,
            "label_upload" => $label_upload,
            "unduh" => $unduh,
            "count" => $count
        ]);
    }

    

    public function store(Request $request){
        
        $request->validate([
            'file_unduh_3' => 'mimes:pdf|max:2048',
            'file_unduh_4' => 'mimes:pdf|max:2048',
            'quota' => 'integer'
        ]);
        $i=0;
        $unduh = array_filter([$request->file_unduh_3,
                        $request->file_unduh_4]);

        foreach($unduh as $u){
            $fileName[$i++] = time().rand(100,999).".".$u->getClientOriginalExtension();
        } 
        $post_pelatihan = array(
            'key' => Str::random(6),
            'open_regist' => $request->open_regist,
            'close_regist' => $request->close_regist,
            'open_ws' => $request->open_ws,
            'close_ws' => $request->close_ws,
            'title' => $request->title,
            'quota' => $request->quota,
            'place' => $request->place,
            'cp' => $request->cp,
            'describe' => $request->describe,
            'criteria' => $request->criteria,
            'label_upload_1' => $request->label_upload_1,
            'label_upload_2' => $request->label_upload_2,
            'label_upload_3' => $request->label_upload_3,
            'label_unduh_1' => $request->label_unduh_1,
            'label_unduh_2' => $request->label_unduh_2,
            'label_unduh_3' => $request->label_unduh_3,
            'label_unduh_4' => $request->label_unduh_4,
        );

        if ($request->file_unduh_3 !== null){
            $request->file_unduh_3->move(public_path('admin/berkas/'.$fileName[0]));
            $post_pelatihan["file_unduh_3"]=$fileName[0];
    
        }
        if ($request->file_unduh_4 !== null){
            $request->file_unduh_4->move(public_path('admin/berkas/'.$fileName[1]));
            $post_pelatihan["file_unduh_4"]=$fileName[1];
        }
                    
        $post_pelatihan["created_at"]=date('Y-m-d H:i:s');
        $post_pelatihan["updated_at"]=date('Y-m-d H:i:s');
        DB::table('workshops')->insert($post_pelatihan);

        return redirect('/admin/pelatihan')->with('success','Pelatihan Berhasil Ditambahkan');
        
    }
}