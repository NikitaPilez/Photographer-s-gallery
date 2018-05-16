<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\DescriptionServices;
use App\Http\Requests\CreateDescriptionServicesRequest;
use App\Http\Requests\UpdateDescriptionServicesRequest;
use Illuminate\Http\Request;

use App\Services;


class DescriptionServicesController extends Controller {

	/**
	 * Display a listing of descriptionservices
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $descriptionservices = DescriptionServices::with("services")->get();

		return view('admin.descriptionservices.index', compact('descriptionservices'));
	}

	/**
	 * Show the form for creating a new descriptionservices
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    $services = Services::pluck("name", "id")->prepend('Please select', 0);

	    
	    return view('admin.descriptionservices.create', compact("services"));
	}

	/**
	 * Store a newly created descriptionservices in storage.
	 *
     * @param CreateDescriptionServicesRequest|Request $request
	 */
	public function store(CreateDescriptionServicesRequest $request)
	{
	    
		DescriptionServices::create($request->all());

		return redirect()->route(config('quickadmin.route').'.descriptionservices.index');
	}

	/**
	 * Show the form for editing the specified descriptionservices.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$descriptionservices = DescriptionServices::find($id);
	    $services = Services::pluck("name", "id")->prepend('Please select', 0);

	    
		return view('admin.descriptionservices.edit', compact('descriptionservices', "services"));
	}

	/**
	 * Update the specified descriptionservices in storage.
     * @param UpdateDescriptionServicesRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateDescriptionServicesRequest $request)
	{
		$descriptionservices = DescriptionServices::findOrFail($id);

        

		$descriptionservices->update($request->all());

		return redirect()->route(config('quickadmin.route').'.descriptionservices.index');
	}

	/**
	 * Remove the specified descriptionservices from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		DescriptionServices::destroy($id);

		return redirect()->route(config('quickadmin.route').'.descriptionservices.index');
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
            DescriptionServices::destroy($toDelete);
        } else {
            DescriptionServices::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.descriptionservices.index');
    }

}
