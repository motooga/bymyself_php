<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Point;
use Inertia\Inertia;
use Carbon\Carbon;

class UserController extends Controller
{

   
    public function show(User $user)
    {
        $user = Auth::User();
        $orders = Order::where('user_id', $user->id)
                        ->whereDate('end_date', '>',  Carbon::today())
                        ->with(['task'])
                        ->get();


         return Inertia::render('User/Dashboard', [
             'orders' => $orders,
        ]);
    }
}