<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Models\Event\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Define authorization to routes.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->authorizeResource(Organizer::class, 'organizer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function show(Organizer $organizer)
    {
        return view('event/show', ['organizer' => $organizer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizer $organizer)
    {
        return view('event/edit', ['organizer' => $organizer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event\Organizer  $organizer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizer $organizer)
    {
        //
    }
}
