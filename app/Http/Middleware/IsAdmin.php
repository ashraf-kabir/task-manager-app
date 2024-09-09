<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
    // Check if the authenticated user is an admin
    if (Auth::check() && Auth::user()->is_admin) {
      return $next($request); // Proceed if the user is an admin
    }

    // Redirect or abort if the user is not an admin
    return redirect('/home')->with('error', 'You do not have privileges to access this page.');
  }
}
