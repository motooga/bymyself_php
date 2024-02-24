<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
use App\Models\Family;
use Inertia\Inertia;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orders = Order::select('id' , 'task_name' , 'category' , 'type')
        // ->get();
        
        return Inertia::render('Orders/Index');

    }

    public function create()
    {
        $tasks = Task::select('id' , 'task_name')
            ->get();
        $users = User::select('id' , 'nickname')
            ->get();
        return Inertia::render('Orders/Create',[
        'tasks' => $tasks,
        'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $loggedInFamily = Auth::user();

        Order::create([
            'task_id' => $request ->task_id,
            'user_id' => $request ->user_id,
            'set_point' => $request ->set_point,
            'start_date' => $request ->start_date,
            'end_date' => $request ->end_date,
            'family_id' => $loggedInFamily->id,
        ]);

        return to_route('show',['user'=> $request -> user_id ])
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
