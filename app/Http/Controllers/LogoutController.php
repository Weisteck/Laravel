<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke()
    {
        Auth::logout();
        return redirect('/');
    }
}
