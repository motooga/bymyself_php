<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ManageUserController extends Controller
{
    public function index()
    {
        $family = Auth::user();
        ($users = User::whereBelongsTo($family)->get());
        
        return Inertia::render('Auth/Index',[
            'users' => $users
        ]);
    }

}
