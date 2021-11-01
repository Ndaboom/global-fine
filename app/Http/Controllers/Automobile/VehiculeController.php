<?php

namespace App\Http\Controllers\Automobile;

use App\Http\Controllers\Controller;
use App\Models\Automobile\Vehicule;
// use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    /**
     * Define authorization to routes.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->authorizeResource(Vehicule::class, 'vehicule');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('automobile/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('automobile/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Automobile\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicule $vehicule)
    {
        return view('automobile/show', ['vehicule' => $vehicule]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Automobile\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicule $vehicule)
    {
        return view('automobile/edit', ['vehicule' => $vehicule]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Automobile\Vehicule  $vehicule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }
}
