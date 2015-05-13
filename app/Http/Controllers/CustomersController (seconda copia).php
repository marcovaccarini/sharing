<?php namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CustomerRequest;
use App\Service;

use App\Slide;
use Request;
use Response;

class CustomersController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function index(){

        $metadescription = 'Descrizione pagina indice del Portfolio';
        $metatitle = 'Title per la pagina indice del Portfolio';

        $customers = Customer::latest()->get();

        return view('customers.index', compact('customers', 'metadescription', 'metatitle'));

	}

    public function show(Customer $customer){

        $metadescription = $customer->description;
        $metatitle = $customer->name;

        return view('customers.show', compact('customer', 'metadescription', 'metatitle'));

    }

    public function admin(){
        /*
        if (\Auth::guest())
        {
            return redirect('customers');
        }
        */
        $customers = Customer::latest()->get();
        return view('admin.index_customers', compact('customers'));
    }

    public function create(){

        $services = Service::lists('name', 'id');

        $slides = Slide::lists('filename', 'filename');

        return view('customers.create', compact('services', 'slides'));
    }

    public function store(CustomerRequest $request){

     //   $input = Request::all();
     //   return $input;


        $this->CreateCustomer($request);
/*
        $slides = $request->input('slides');

        foreach ($slides as $slide)
        {
            $slides = [
                new Slide(['filename' => $slide])
            ];
            $customer->slides()->saveMany($slides);
        }
*/

        $var =  Request::ajax();
        dd($var);
        if(Request::ajax()) { // Becuase you are uploading with ajax / dropzone
               $input = Request::all();
               return $input;

            //  Retrieving An Uploaded File
            //$files = Request::file('file');
            $slides = $request->input('file');

           // dd($slides);
            $file_count = count($slides);
            // start count how many uploaded
            $uploadcount = 0;

            $destinationPath = public_path() . '/galleries/';

            foreach($slides as $slide) {
                $rules = array('slide' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('slide'=> $slide), $rules);
                if($validator->passes()){
                    $filename = $slide->getClientOriginalName();

                    $upload_success = $slide->move($destinationPath, $filename);
                    Image::make($destinationPath . $filename)->widen(200)->save($destinationPath . $filename);

                    $slides = [
                        new Slide(['filename' => $slide])
                    ];
                    $customer->slides()->saveMany($slides);


                    $uploadcount ++;
                }
            }
            if($uploadcount == $file_count){
                return \Response::json('success', 200);
            }
            else {
                return \Response::json('error', 400);
            }

        }




        flash()->success('Il portfolio è stato correttamente creato!');

       // return redirect('/index_customers');

    }

    public function edit(Customer $customer){

        $services = Service::lists('name', 'id');

        return view('customers.edit', compact('customer', 'services'));

    }

    public function update(Customer $customer, CustomerRequest $request){

        $customer->update($request->all());

        $this->syncServices($customer, $request->input('service_list'));

        return redirect('index_customers');

    }

    /**
     * Sync up the list of services in the database.
     *
     * @param Customer $customer
     * @param array    $services
     */
    private function syncServices(Customer $customer, array $services)
    {
        $customer->services()->sync($services);
    }

    /**
     * Save a new customer.
     * @param CustomerRequest $request
     * @return static
     */
    private function CreateCustomer(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());

        $this->syncServices($customer, $request->input('service_list'));

        return $customer;
    }

}
