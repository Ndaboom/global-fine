<?php

namespace App\Http\Controllers\Immovable;

use App\Models\Immovable\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PropertyController extends Controller
{
    /**
     * Define authorization to routes.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('immovable/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('immovable/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Immovable\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return view('immovable/show', ['property' => $property]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Immovable\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('immovable/edit', ['property' => $property]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Immovable\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
