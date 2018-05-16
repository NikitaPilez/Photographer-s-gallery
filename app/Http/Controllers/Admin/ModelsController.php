<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Models;
use App\Http\Requests\CreateModelsRequest;
use App\Http\Requests\UpdateModelsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class ModelsController extends Controller {

	/**
	 * Display a listing of models
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $models = Models::all();

		return view('admin.models.index', compact('models'));
	}

	/**
	 * Show the form for creating a new models
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
        $display = Models::$display;

	    return view('admin.models.create', compact("display"));
	}

	/**
	 * Store a newly created models in storage.
	 *
     * @param CreateModelsRequest|Request $request
	 */
	public function store(CreateModelsRequest $request)
	{
	    $request = $this->saveFiles($request);
		Models::create($request->all());

		return redirect()->route(config('quickadmin.route').'.models.index');
	}

	/**
	 * Show the form for editing the specified models.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$models = Models::find($id);
	    
	    
        $display = Models::$display;

		return view('admin.models.edit', compact('models', "display"));
	}

	/**
	 * Update the specified models in storage.
     * @param UpdateModelsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateModelsRequest $request)
	{
		$models = Models::findOrFail($id);

        $request = $this->saveFiles($request);

		$models->update($request->all());

		return redirect()->route(config('quickadmin.route').'.models.index');
	}

	/**
	 * Remove the specified models from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Models::destroy($id);

		return redirect()->route(config('quickadmin.route').'.models.index');
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
            Models::destroy($toDelete);
        } else {
            Models::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.models.index');
    }

}
