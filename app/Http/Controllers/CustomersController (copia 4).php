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

    public function index(){

        $metadescription = 'Descrizione pagina indice del Portfolio';
        $metatitle = 'Title per la pagina indice del Portfolio';

        $customers = Customer::latest()->get();

        return view('customers.index', compact('customers', 'metadescription', 'metatitle'));

    }

    public function showthumb($customer_id){

        $slide = Slide::all()->where('customer_id', $customer_id);
        $result  = array();
        foreach ( $slide as $foto ) {
            $obj['name'] = $foto->filename;
            $file = public_path() . '/lavori/' .$foto->filename;
            $bytes = File::size($file);
            $obj['size'] = $bytes;
            $obj['id'] = $foto->id;
            $result[] = $obj;
        }
        return $result;
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

        // update del campo logo nella tabella customer
        $customer->logo = null;
        $customer->save();

        return Response::json(['success' => true]);

    }

    public function show(Customer $customer){

        $metadescription = $customer->description;
        $metatitle = $customer->name;

        return view('customers.show', compact('customer', 'metadescription', 'metatitle'));

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

        $customer = Customer::create($request->all());


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

        //  Retrieving All Uploaded Files
        $files = Request::file('file');

        $destinationPath = public_path() . '/lavori/';

        foreach($files as $file) {

            $filename = $file->getClientOriginalName();

            $extension = $logo->getClientOriginalExtension(); // getting image extension

            $fileReName = Str::slug($request->get('name')) . '-' . rand(1111,9999) . '.' . $extension; // renameing image

            $upload_success = $file->move($destinationPath, $fileReName);
            Image::make($destinationPath . $fileReName)->widen(750)->save($destinationPath . $fileReName);
            Image::make($destinationPath . $fileReName)->widen(250)->save($destinationPath . 'thumbnail/' . $fileReName);

            $slides = [
                new Slide(['filename' => $fileReName])
            ];

            $customer->slides()->saveMany($slides);

        }

        $customer->services()->sync($request->input('service_list'));

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

        $this->uploadLogo($customer, $request->input('logo'));

        $this->uploadSlides($customer, $request->input('file'));

        return redirect('index_customers');

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
     * @param Customer $customer
     * @param CustomerRequest $request
     * @return mixed
     */
    private function uploadLogo(CustomerRequest $request, array $logo)
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
    private function uploadSlides(CustomerRequest $request, array $slides)
    {
        //  Retrieving All Uploaded Files
        $files = Request::file('file');

        $destinationPath = public_path() . '/lavori/';

        foreach ($files as $file) {

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
