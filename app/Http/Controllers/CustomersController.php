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
use File;

use Illuminate\Support\Facades\Input as Input;

use Illuminate\Support\Str;




class CustomersController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function destroyslides() {

        $key = Request::input('key');

        $slide = Slide::findOrFail($key);

        $affectedRows = Slide::where('id', '=', $key)->delete();

        File::delete('lavori/'.$slide->filename);

        File::delete('lavori/thumbnail/'.$slide->filename);

        return Response::json(['success' => true]);

    }


    public function destroylogo(){

        $id = Request::input('key');

        $customer = Customer::find($id);

        File::delete('clienti/'.$customer->logo);

        $customer->logo = null;

        $customer->save();

        return Response::json(['success' => true]);

    }

    public function index(){

        $metadescription = 'Descrizione pagina indice del Portfolio';
        $metatitle = 'Title per la pagina indice del Portfolio';

        $customers = Customer::latest()->get();

        return view('customers.index', compact('customers', 'metadescription', 'metatitle'));

    }

    public function show(Customer $customer){

        $slides = Slide::all()->where('customer_id', $customer->id);

        return view('customers.show', compact('customer', 'slides'));

    }

    public function admin(){

        $customers = Customer::latest()->get();

        return view('admin.index_customers', compact('customers'));
    }

    public function create(){

        $services = Service::lists('name', 'id');

        return view('customers.create', compact('services', 'slides'));

    }

    public function store(CustomerRequest $request){

        $this->createCustomer($request);

        return redirect('/index_customers');


    }

    public function edit(Customer $customer){

        $services = Service::lists('name', 'id');

        $slides = Slide::all()->where('customer_id', $customer->id);

        return view('customers.edit', compact('customer', 'services', 'slides'));

    }

    public function update(Customer $customer, CustomerRequest $request){

        $customer->update($request->all());

        $this->syncServices($customer, $request->input('service_list'));

        $this->uploadLogo($customer, $request);

        $this->uploadSlides($customer, $request);

        return redirect('index_customers');

    }


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
     * @param Customer $customer
     * @param CustomerRequest $request
     * @return mixed
     */
    private function uploadLogo(Customer $customer, CustomerRequest $request)
    {
        $logo = Request::file('logo');

        $logoPath = public_path() . '/clienti/';

        if (Input::hasFile('logo')) {

            $logoname = $logo->getClientOriginalName();

            $extension = $logo->getClientOriginalExtension(); // getting image extension

            $logoReName = Str::slug($request->get('name')) . '.' . $extension; // renameing image

            $upload_success = $logo->move($logoPath, $logoReName);

            Image::make($logoPath . $logoReName)->widen(200)->save($logoPath . $logoReName);

            $customer->logo = $logoReName;

            $customer->save();

        }

    }

    /**
     * @param Customer $customer
     * @param CustomerRequest $request
     */
    private function uploadSlides(Customer $customer, CustomerRequest $request)
    {
        //  Retrieving All Uploaded Files
        $files = Request::file('file');

        $destinationPath = public_path() . '/lavori/';

        foreach ($files as $file) {

            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'

            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()) {

                $filename = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension(); // getting image extension

                $fileReName = Str::slug($request->get('name')) . '-' . rand(1111, 9999) . '.' . $extension; // renameing image

                $upload_success = $file->move($destinationPath, $fileReName);
                Image::make($destinationPath . $fileReName)->widen(750)->save($destinationPath . $fileReName);
                Image::make($destinationPath . $fileReName)->widen(250)->save($destinationPath . 'thumbnail/' . $fileReName);
                $slides = [
                    new Slide(['filename' => $fileReName])
                ];

                $customer->slides()->saveMany($slides);

            }

        }
    }

    /**
     * Save a new customer
     *
     * @param CustomerRequest $request
     * @return static
     */
    private function createCustomer(CustomerRequest $request){

        $customer = Customer::create($request->all());

        $this->uploadLogo($customer, $request);

        $this->uploadSlides($customer, $request);

        $customer->services()->sync($request->input('service_list'));

        return $customer;
    }

}
