<?php namespace App\Http\Controllers;

use App\Casehistory;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CasehistoryRequest;
use App\Service;

use App\Picture;
use Request;
use Validator;
use Response;
use Image;
use File;

use Illuminate\Support\Facades\Input as Input;

use Illuminate\Support\Str;



class CasehistoriesController extends Controller {


    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'edit']]);
    }

    public function destroypicture() {

        $key = Request::input('key');

        $picture = Picture::findOrFail($key);

        $affectedRows = Picture::where('id', '=', $key)->delete();

        File::delete('lavori/'.$picture->filename);

        File::delete('lavori/thumbnail/'.$picture->filename);

        return Response::json(['success' => true]);

    }
    public function index(){

        $casehistories = Casehistory::with('pictures')->latest()->get();

        return view('casehistories.index', compact('casehistories'));
	}

    public function show(Casehistory $casehistory, $slug){

        $casehistory = Casehistory::with('pictures')->whereSlug($slug)->first();

        $pictures = Picture::all()->where('casehistory_id', $casehistory->id);

        $otherCasehistories = Casehistory::with('pictures')->latest()->take(6)->get();

        $metadescription = str_limit($casehistory->soluzione, $limit = 100, $end = '');

        return view('casehistories.show', compact('casehistory', 'pictures', 'otherCasehistories', 'metadescription'));
        
    }

    public function admin(){

        $casehistories = Casehistory::latest()->get();
        return view('admin.index_casehistories', compact('casehistories'));
    }

    public function create(){

        return view('casehistories.create');

    }

    public function store(CasehistoryRequest $request){

        $this->createCasehistory($request);

        return redirect('index_casehistories');

    }

    public function edit(Casehistory $casehistory){

        $pictures = Picture::all()->where('casehistory_id', $casehistory->id);

        return view('casehistories.edit', compact('casehistory', 'pictures'));
        
    }

    public function destroy(Casehistory $casehistory){

        $casehistory->delete();

        return redirect('index_casehistories');
    }

    public function update(Casehistory $casehistory, CasehistoryRequest $request){

        $casehistory->update($request->all());

        $this->uploadPictures($request, $casehistory);

        return redirect('index_casehistories');
        
    }

    /**
     * @param CasehistoryRequest $request
     * @param $casehistory
     */
    private function uploadPictures(CasehistoryRequest $request, $casehistory)
    {
        $files = Request::file('file');

        $destinationPath = public_path() . '/lavori/';

        foreach ($files as $file) {

            $rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'

            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()) {

                $filename = $file->getClientOriginalName();

                $extension = $file->getClientOriginalExtension(); // getting image extension

                $fileReName = Str::slug($request->get('titolo')) . '-' . rand(1111, 9999) . '.' . $extension; // renameing image

                $upload_success = $file->move($destinationPath, $fileReName);

                Image::make($destinationPath . $fileReName)->widen(700)->save($destinationPath . $fileReName);

                Image::make($destinationPath . $fileReName)->heighten(100)->crop(100, 100)->save($destinationPath . 'thumbnail/' . $fileReName);

                $pictures = [
                    new Picture(['filename' => $fileReName])
                ];

                $casehistory->pictures()->saveMany($pictures);

            }

        }
    }


    /**
     * @param CasehistoryRequest $request
     */
    private function createCasehistory(CasehistoryRequest $request)
    {

        $casehistory = Casehistory::create($request->all());

        $casehistory->slug = $this->makeSlugFromTitle($request->input('titolo'));

        $casehistory->save();

        $this->uploadPictures($request, $casehistory);
    }

    private function makeSlugFromTitle($title)
    {
        $slug = Str::slug($title);

        $count = Casehistory::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

        return $count ? "{$slug}-{$count}" : $slug;
    }

}
