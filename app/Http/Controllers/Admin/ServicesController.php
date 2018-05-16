<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Services;
use App\Http\Requests\CreateServicesRequest;
use App\Http\Requests\UpdateServicesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ServicesController extends Controller {

	/**
	 * Display a listing of services
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $services = Services::all();

		return view('admin.services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new services
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
        $display = Services::$display;

	    return view('admin.services.create', compact("display"));
	}

	/**
	 * Store a newly created services in storage.
	 *
     * @param CreateServicesRequest|Request $request
	 */
	public function store(CreateServicesRequest $request)
	{
	    $request = $this->saveFiles($request);
		Services::create($request->all());

		return redirect()->route(config('quickadmin.route').'.services.index');
	}

	/**
	 * Show the form for editing the specified services.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$services = Services::find($id);
	    
	    
        $display = Services::$display;

		return view('admin.services.edit', compact('services', "display"));
	}

	/**
	 * Update the specified services in storage.
     * @param UpdateServicesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateServicesRequest $request)
	{
		$services = Services::findOrFail($id);

        $request = $this->saveFiles($request);

		$services->update($request->all());

		return redirect()->route(config('quickadmin.route').'.services.index');
	}

	/**
	 * Remove the specified services from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Services::destroy($id);

		return redirect()->route(config('quickadmin.route').'.services.index');
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
            Services::destroy($toDelete);
        } else {
            Services::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.services.index');
    }

}
