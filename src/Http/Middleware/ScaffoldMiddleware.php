<?php

namespace Amranidev\ScaffoldInterface\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Class ScaffoldMiddleware.
 *
 * @author Athi Krishnan <athikrishnan5@gmail.com>
 */
class ScaffoldMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->segment(1) == 'scaffold') {

            // allowed env-s check
            $allowed = collect(config('amranidev.config.env'))
                            ->contains(config('app.env'));

            if (!$allowed) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
