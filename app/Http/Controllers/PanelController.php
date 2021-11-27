<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PanelController extends Controller
{
    
    public function index(){
        if(Auth::user()->hasRole('user')){
            return redirect('/beranda');
        }elseif(Auth::user()->hasRole('admin')){
            return redirect('/admin/dashboard');
        }
    }
}