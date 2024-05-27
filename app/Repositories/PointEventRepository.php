<?php

namespace App\Repositories;


use App\Models\Point_event;

class PointEventRepository
{
    public function recordPointEvent($eventType, $pointsEarned, $reportId, $userId)
    {
        Point_event::create([
            'type' => $eventType,
            'point' => $pointsEarned,
            'report_id' => $reportId,
            'user_id' => $userId,
         ]);
    }
}