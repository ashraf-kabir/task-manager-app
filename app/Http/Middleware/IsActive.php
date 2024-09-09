<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsActive
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    // Check if the user is authenticated and if they are active
    if (Auth::check() && Auth::user()->is_active) {
      return $next($request); // Allow access if user is active
    }

    // Redirect if user is not active
    Auth::logout(); // Optionally log the user out if not active
    return redirect('/login')->with('error', 'Your account is inactive. Please contact admin.');
  }
}
