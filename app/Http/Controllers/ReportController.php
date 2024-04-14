<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Report;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $user_id = Auth::user()->id;
        $reports = Report::where('user_id' , $user_id )
        ->with(['order.task'])
        ->get();

      
        return Inertia::render('Reports/Index' ,[
         'reports' => $reports
        ]);
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
        $user_id = Auth::user()->id;

        $memo = $request->input('memo');
        if (!$request -> image) {
            Report::create([
                'order_id' => $orderId,
                'user_id' => $user_id,
                'memo' => $memo,
                'is_done' => $is_done,
            ]);
           
        }
        else{$path = $request->file('image')->store(
                'reports/'.$request->user()->id, 's3'
                );

        if (!$path) {

            return back()->withErrors(['error' => 'ファイルの保存に失敗しました。']);
        }
        $reportphoto_url = Storage::disk('s3')->url($path);

        $report = new Report([
            'order_id' => $orderId,
            'user_id' => $user_id,
            'memo' => $memo,
            'is_done' => $is_done,
            'reportphoto_url' => $reportphoto_url
        ]);

        
        $report->save();
        }
    
        return to_route('user.dashboard');


}
    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $report->load('order.task');

        return Inertia::render('Reports/Show', [
            'report' => $report
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        $report->load('order.task');
        return Inertia::render('Reports/Edit', [
            'report' => $report,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     */

    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->memo = $request->memo;
        if($request->hasFile('image')) {
            Storage::disk('s3')->delete($report->reportphpto_url); // 画像削除
          $report->image = $request->file('image')->store(
                'reports/'.$request->user()->id, 's3'
                );
        $report->save();
        return to_route('user.dashboard');
  }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
}
