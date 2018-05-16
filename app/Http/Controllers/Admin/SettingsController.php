<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Settings;
use App\Http\Requests\CreateSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class SettingsController extends Controller {

	/**
	 * Display a listing of settings
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $settings = Settings::all();

		return view('admin.settings.index', compact('settings'));
	}

	/**
	 * Show the form for creating a new settings
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.settings.create');
	}

	/**
	 * Store a newly created settings in storage.
	 *
     * @param CreateSettingsRequest|Request $request
	 */
	public function store(CreateSettingsRequest $request)
	{
	    $request = $this->saveFiles($request);
		Settings::create($request->all());

		return redirect()->route(config('quickadmin.route').'.settings.index');
	}

	/**
	 * Show the form for editing the specified settings.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$settings = Settings::find($id);
	    
	    
		return view('admin.settings.edit', compact('settings'));
	}

	/**
	 * Update the specified settings in storage.
     * @param UpdateSettingsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSettingsRequest $request)
	{
		$settings = Settings::findOrFail($id);

        $request = $this->saveFiles($request);

		$settings->update($request->all());

		return redirect()->route(config('quickadmin.route').'.settings.index');
	}

	/**
	 * Remove the specified settings from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Settings::destroy($id);

		return redirect()->route(config('quickadmin.route').'.settings.index');
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
            Settings::destroy($toDelete);
        } else {
            Settings::whereNotNull('id')->delete();
        }

        return redirect()->route(config('quickadmin.route').'.settings.index');
    }

}
