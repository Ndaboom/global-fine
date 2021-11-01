<?php

namespace App\Http\Middleware;

use App\Models\Event\Organizer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LoadEventOrganizers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->ajax() && Gate::allows('viewAny', Organizer::class)) {
            view()->share('organizers', Organizer::all());
        }

        return $next($request);
    }
}
