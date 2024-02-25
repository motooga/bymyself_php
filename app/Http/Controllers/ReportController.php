<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Models\Order;
use App\Models\Task;
use Inertia\Inertia;

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
    
        return Inertia::render('Report/Create', [
            'order' => $order,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request, $order)
{
    $is_done = 1;
    $reportphoto_url = $request->file('reportphoto_url');

    try {

        $this->validate($request, [
            'reportphoto_url' => [
                'required',
                'image', // 画像であることを検証
                'mimes:jpeg,png,jpg,gif', // 許可する拡張子
                'max:2048', // ファイルサイズの上限（2MB）
            ],
        ]);
    

        DB::beginTransaction();

        $path = null;
        if ($request->hasFile('reportphoto_url')) {
            $path = $request->file('reportphoto_url')->store('reportphoto_url');

            Report::create([
                'order_id' => $order,
                'memo' => $request->memo,
                'reportphoto_url' => $path,
                'is_done' => $is_done,
            ]);
        }


        DB::commit();

        return redirect()->intended(RouteServiceProvider::USER_HOME)
            ->with([
                'message' => '登録しました。',
                'status' => 'success'
            ]);

    } catch (\Exception $e) {

        DB::rollBack();


        return back()->withInput()->withErrors(['error' => '登録に失敗しました。']);
    }
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
