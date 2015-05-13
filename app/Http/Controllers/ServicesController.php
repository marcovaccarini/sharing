<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Service;

class ServicesController extends Controller {

    public function index()
    {

        $metadescription = 'Descrizione pagina indice dei Servizi';
        $metatitle = 'Title per la pagina indice dei Servizi';

        $services = Service::get();

        return view('services.index', compact('services', 'metadescription', 'metatitle'));

	}


    public function show($slug)
    {

        $service = Service::with('customers')->whereSlug($slug)->first();
        //return $service;

        $metadescription = str_limit($service->body, $limit = 100, $end = '');

        $metatitle = $service->name;

        return view('services.show', compact('service', 'metadescription', 'metatitle'));
    }

}
