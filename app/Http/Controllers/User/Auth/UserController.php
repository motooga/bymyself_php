<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Inertia\Inertia;

class UserController extends Controller
{
    public function show(User $user)
    {

         
        $orders = Order::where('user_id', $user->id)->with('task')->get();
        


         return Inertia::render('User/Show', [
             'user' => $user,
             'orders' => $orders,
        ]);
    }
}