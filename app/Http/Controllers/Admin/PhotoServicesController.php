<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\PhotoServices;
use App\Http\Requests\CreatePhotoServicesRequest;
use App\Http\Requests\UpdatePhotoServicesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Services;


class PhotoServicesController extends Controller {

	/**
	 * Display a listing of photoservices
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $photoservices = PhotoServices::with("services")->get();

		return view('admin.photoservices.index', compact('photoservices'));
	}

	/**
	 * Show the form for creating a new photoservices
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $services = Services::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.photoservices.create', compact("services"));
	}

	/**
	 * Store a newly created photoservices in storage.
	 *
     * @param CreatePhotoServicesRequest|Request $request
	 */
	public function store(CreatePhotoServicesRequest $request)
	{
	    $request = $this->saveFiles($request);
		PhotoServices::create($request->all());

		return redirect()->route(config('quickadmin.route').'.photoservices.index');
	}

	/**
	 * Show the form for editing the specified photoservices.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$photoservices = PhotoServices::find($id);
	    $services = Services::pluck("name", "id")->prepend('Please select', 0);

	    
		return view('admin.photoservices.edit', compact('photoservices', "services"));
	}

	/**
	 * Update the specified photoservices in storage.
     * @param UpdatePhotoServicesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdatePhotoServicesRequest $request)
	{
		$photoservices = PhotoServices::findOrFail($id);

        $request = $this->saveFiles($request);

		$photoservices->update($request->all());

		return redirect()->route(config('quickadmin.route').'.photoservices.index');
	}

	/**
	 * Remove the specified photoservices from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		PhotoServices::destroy($id);

		return redirect()->route(config('quickadmin.route').'.photoservices.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            PhotoServices::destroy($toDelete);
        } else {
            PhotoServices::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.photoservices.index');
    }

}
