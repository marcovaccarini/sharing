<?php namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CustomerRequest;
use App\Service;

use App\Slide;
use Request;
use Response;
use Validator;
use Image;

use Illuminate\Support\Facades\Input as Input;

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
        //return view('drop');
    }

    public function store(CustomerRequest $request){
        //$this->CreateCustomer($request);
        $customer = Customer::create($request->all());

        $this->syncServices($customer, $request->input('service_list'));


        $file = Input::all();

        if(Request::ajax()) { // Becuase you are uploading with ajax / dropzone
            //  Retrieving An Uploaded File
            $files = Request::file('file');

            $file_count = count($files);
            // start count how many uploaded
            $uploadcount = 0;

            $destinationPath = public_path() . '/galleries/';

            foreach($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                    $filename = $file->getClientOriginalName();

                    $upload_success = $file->move($destinationPath, $filename);
                    Image::make($destinationPath . $filename)->widen(200)->save($destinationPath . $filename);
                    $slides = [
                        new Slide(['filename' => $filename])
                    ];

                    $uploadcount ++;
                }

                $customer->slides()->saveMany($slides);

            }
            if($uploadcount == $file_count){
                return \Response::json('success', 200);
            }
            else {
                return \Response::json('error', 400);
            }
        }

        return redirect('/index_customers');








        //   $input = Request::all();
        //   return $input;


        //$this->CreateCustomer($request);
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


        /*
                if(Request::ajax()) { // Becuase you are uploading with ajax / dropzone




                       $input = Request::all();


                    //  Retrieving An Uploaded File
                    //$files = Request::file('file');
                    $slides = $request->input('file');
                    return $slides;
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


        */

    }

    public function edit(Customer $customer){

        $services = Service::lists('name', 'id');

        return view('customers.edit', compact('customer', 'services'));

    }

    public function update(Customer $customer, CustomerRequest $request){
        $method = Request::method();
return $method;





        $customer->update($request->all());

        $this->syncServices($customer, $request->input('service_list'));


        //delete all slides of the given customer
        //$customer->slides()->delete('id');


        $file = Input::all();

        if(Request::ajax()) { // Becuase you are uploading with ajax / dropzone

            //  Retrieving An Uploaded File
            $files = Request::file('file');

            $file_count = count($files);
            // start count how many uploaded
            $uploadcount = 0;

            $destinationPath = public_path() . '/galleries/';

            foreach($files as $file) {
                $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                $validator = Validator::make(array('file'=> $file), $rules);
                if($validator->passes()){
                    $filename = $file->getClientOriginalName();

                    $upload_success = $file->move($destinationPath, $filename);
                    Image::make($destinationPath . $filename)->widen(200)->save($destinationPath . $filename);
                    $slides = [
                        new Slide(['filename' => $filename])
                    ];

                    $uploadcount ++;
                }

                $customer->slides()->saveMany($slides);

            }
            if($uploadcount == $file_count){
                return \Response::json('success', 200);
            }
            else {
                return \Response::json('error', 400);
            }
        }





    }

    //  https://laracasts.com/series/laravel-5-from-scratch/episodes/14
    public function destroy(Customer $customer){

        $customer->delete();

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