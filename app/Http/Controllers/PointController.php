<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePointRequest;
use App\Http\Requests\UpdatePointRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Point;

class PointController extends Controller
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
    public function store(StorePointRequest $request)
    {
        $latestPoint = Point::where('user_id', $request->user_id)
        ->latest()
        ->first();

    if ($latestPoint) {
        $newAllPoint = $latestPoint->all_point + $request->points_earned;

        $point = Point::create([
            'user_id' => $request->user_id,
            'all_point' => $newAllPoint,
        ]);
    } else {
        $point = Point::create([
            'user_id' => $request->user_id,
            'all_point' => $request->points_earned,
        ]);
    }

    
    return redirect()->route('orders.index')
        ->with([
            'message' => 'ポイントを保存しました。',
            'status' => 'success'
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePointRequest $request, Point $point)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {
        //
    }
}
