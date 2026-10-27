<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Frontendcontroller extends Controller
{
    public function index(Request $request){
        return view('landingpage');
    }

     public function dashboard(Request $request){
        return view('pages.dashboard.index');
    }


    //Entidade Cozinha
     public function cozinha(Request $request){
        return view('pages.cozinha.index');
    }
    
     public function createCozinha (Request $request){
        return view('pages.cozinha.create');


    }
    //Entidade Menu
    public function menu(Request $request){
        return view('pages.menu.index');
    }

    public function createMenu (Request $request){
        return view('pages.menu.create');
    }

    //Entidade POS
    public function pos(Request $request){
        return view('pages.pos.index');
    }

    // Entidades Reservas
     public function reservas(Request $request){
        return view('pages.reservas.index');
    }

    public function createReservas (Request $request){
        return view('pages.reservas.create');
    }
/**
    public function entrada (Request $request){
        return view('pages.auth.login');
    }
    public function inscricao (Request $request){
        return view('pages.auth.register');
    }
    public function recuperar (Request $request){
        return view('pages.auth.pass-recover');
    }
    public function viva (Request $request){
        return view('pages.auth.success_page1');
    }
*/
    // Entidade Users
   
}