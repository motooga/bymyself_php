<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use App\Models\Task;
use Inertia\Inertia;
use Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($order)
    {
        $order = Order::with('task')->find($order);

        if (!$order) {
            abort(404);
        }
    
        return Inertia::render('Reports/Create', [
            'order' => $order,
        ]);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request, $orderId)
    {
        $is_done = 1;
        $memo = $request -> input('memo');
        $image = $request -> file('image');

        Report::create([
            'order_id' => $orderId,
            'memo' => $memo,
            'is_done' => $is_done,
        ]);
    return to_route('user.dashboard')
    ->with([
        'message' => '登録しました。',
        'status' => 'success'
    ]);


}
    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
