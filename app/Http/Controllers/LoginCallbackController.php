<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;

class LoginCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function __invoke()
    {
        $user = Socialite::driver('github')->user();

        $databaseUser = User::query()->firstOrNew(['email' => $user->getEmail()]);

        $databaseUser
            ->fill([
                'name' => $user->getName() ?? $user->getNickname(),
                'email' => $user->getEmail()
            ])
            ->save();

        Auth::login($databaseUser);

        return redirect('/');
    }
}
