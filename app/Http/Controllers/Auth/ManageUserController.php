<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
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

    public function show(User $user)
    {

        $orders = Order::where('user_id', $user->id)->with('task')->get();

         return Inertia::render('User/Show', [
             'user' => $user,
             'orders' => $orders,
        ]);
    }

}
