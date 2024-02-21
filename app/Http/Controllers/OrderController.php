<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Task;
use App\Models\User;
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

        Order::create([
            'task_name' => $request ->task_name,
            'category' => $request ->category,
            'type' => $request ->type,
        ]);

        return to_route('user.show')
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
