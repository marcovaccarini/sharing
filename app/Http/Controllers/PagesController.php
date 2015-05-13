<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
    public function contatti(){

        return view('pages.contatti');

    }

    public function about(){

        return view('pages.about');
    }
    public function metodo(){

        return view('pages.metodo');
    }

    public function admin(){
        return view('admin.index');
    }

}
