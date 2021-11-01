<?php

namespace App\Http\Controllers\Service;

use App\Models\Service\ExtraService;
use App\Http\Controllers\Controller;

class ExtraServiceController extends Controller
{
    /**
     * Define authorization to routes.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->authorizeResource(ExtraService::class, 'extraService');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExtraService  $extraService
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraService $extraService)
    {
        return view('service/show', ['extraService' => $extraService]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraService  $extraService
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraService $extraService)
    {
        return view('service/edit', ['extraService' => $extraService]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraService  $extraService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraService $extraService)
    {
        //
    }
}
