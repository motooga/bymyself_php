<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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

class RegisteredFamilyController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'family_name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.Family::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $family = Family::create([
            'family_name' => $request->family_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($family));

        Auth::guard('family')->login($family);

        return redirect(RouteServiceProvider::HOME);
    }
}
