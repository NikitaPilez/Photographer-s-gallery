<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Communications;
use App\Http\Requests\CreateCommunicationsRequest;
use App\Http\Requests\UpdateCommunicationsRequest;
use Illuminate\Http\Request;



class CommunicationsController extends Controller {

	/**
	 * Display a listing of communications
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $communications = Communications::all();

		return view('admin.communications.index', compact('communications'));
	}

	/**
	 * Show the form for creating a new communications
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.communications.create');
	}

	/**
	 * Store a newly created communications in storage.
	 *
     * @param CreateCommunicationsRequest|Request $request
	 */
	public function store(CreateCommunicationsRequest $request)
	{
	    
		Communications::create($request->all());

		return redirect()->route(config('quickadmin.route').'.communications.index');
	}

	/**
	 * Show the form for editing the specified communications.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$communications = Communications::find($id);
	    
	    
		return view('admin.communications.edit', compact('communications'));
	}

	/**
	 * Update the specified communications in storage.
     * @param UpdateCommunicationsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateCommunicationsRequest $request)
	{
		$communications = Communications::findOrFail($id);

        

		$communications->update($request->all());

		return redirect()->route(config('quickadmin.route').'.communications.index');
	}

	/**
	 * Remove the specified communications from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Communications::destroy($id);

		return redirect()->route(config('quickadmin.route').'.communications.index');
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
            Communications::destroy($toDelete);
        } else {
            Communications::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.communications.index');
    }

}
