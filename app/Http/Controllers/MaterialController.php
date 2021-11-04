<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Material;
use Illuminate\Support\Facades\File;

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
}