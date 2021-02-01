<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Configuration;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuration = Configuration::all();
        return Inertia::render('Configuration/Index', [
            'configuration' => $configuration,
        ]);
       return ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        var_dump($request);
        // $request->validate([
        //     'siteName' => 'required',
        //     'siteDescription' => 'required',
        //     'adminEmail' => 'required|email',
        //     'titleTag' => 'required',
        //     'allowLogin' => 'required|boolean',
        //     'allowRegistration' => 'required|boolean',
        //     'maintenanceMode' => 'required|boolean'
        // ]);
        // Configuration::whereId(1)->update([
        //     'siteName' => $request->name,
        //     'siteDescription' => $request->email,
        //     'titleTag' => $request->titleTag,
        //     'allowLogin' => $request->allowLogin,
        //     'allowRegistration' => $request->allowRegistration,
        //     'maintenanceMode' => $request->maintenanceMode,
        //     'adminEmail' => $request->adminEmail,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
