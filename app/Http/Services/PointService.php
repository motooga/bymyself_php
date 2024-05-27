<?php

namespace App\Http\Services;

use App\Repositories\PointRepository;
use App\Repositories\PointEventRepository;
use Illuminate\Support\Facades\DB;

class PointService
{
    protected $pointRepository;
    protected $pointEventRepository;

    public function __construct(PointRepository $pointRepository, PointEventRepository $pointEventRepository)
    {
        $this->pointRepository = $pointRepository;
        $this->pointEventRepository = $pointEventRepository;
    }

    public function increasePoints($userId, $eventType, $pointsEarned, $reportId)
    {
        return $this->updatePoints($userId, $eventType, $pointsEarned, $reportId);
    }

    public function decreasePoints($userId, $eventType, $pointsEarned, $reportId)
    {
        return $this->updatePoints($userId, $eventType, $pointsEarned, $reportId);
    }

    protected function updatePoints($userId, $eventType, $pointsEarned, $reportId)
    {
        return DB::transaction(function () use ($userId, $eventType, $pointsEarned, $reportId) {

            $this->pointEventRepository->recordPointEvent($eventType, $pointsEarned, $reportId, $userId);

            // total_pointsの更新
            $this->pointRepository->updatePoints($userId, $pointsEarned);

            return true; // 成功を示すフラグを返す
        });
    }

    public function getPoints($userId)
    {
        return $this->pointRepository->getPoints($userId);
    }
}