<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePoint_eventRequest;
use App\Http\Requests\UpdatePoint_eventRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Point_event;
use App\Models\Point;

class PointEventController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePoint_eventRequest $request)
    {
        $point_event =  Point_event::create([
            'type' => $request ->event_type,
            'point' => $request ->points_earned,
            'report_id' => $request ->report_id,
            'user_id' => $request ->user_id,
         ]);
         $point_event->save();
         
        return to_route('orders.index')
        ->with([
            'message' => 'しょうにんしました。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Point_event $point_event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point_event $point_event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePoint_eventRequest $request, Point_event $point_event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point_event $point_event)
    {
        //
    }
}
