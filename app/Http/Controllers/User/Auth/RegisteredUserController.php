<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Family;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('User/Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $loggedInUser = Auth::user();
        
        $request->validate([
            'nickname' => 'required|string|max:255',
            'login_id' => 'required|string|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nickname' => $request->nickname,
            'login_id' => $request->login_id,
            'password' => Hash::make($request->password),
            'family_id' => $loggedInUser->id,
        ]);

        event(new Registered($user));

        // Auth::guard('user')->login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
