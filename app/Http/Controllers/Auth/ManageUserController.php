<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateManageUserRequest as RequestsUpdateManageUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
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

        $orders = Order::where('user_id', $user->id)
        ->with('task')->get();

         return Inertia::render('Show', [
             'user' => $user,
             'orders' => $orders,
        ]);
    }


    public function FamilyReportShow(Report $report)
    {
   
        $report->load(['order.task','user']);

        return Inertia::render('Auth/FamilyReportShow', [
            'report' => $report
        ]);
    }

        
    public function update(RequestsUpdateManageUserRequest $request, Report $report)
    {
            $report-> is_done = $request->is_done; 
            $report->save(); 

            
        }


}
