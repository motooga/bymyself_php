<?php

namespace App\Repositories;

use App\Models\Point;

class PointRepository
{
    public function updatePoints($userId, $pointsEarned)
    {
        $totalPoints = Point::where('user_id', $userId)->latest('id')->first();

        if ($totalPoints) {
            // 更新処理
            Point::where('id', $totalPoints->id)->update(['all_point' => $totalPoints->all_point + $pointsEarned]);
        } else {
            // 初めてのポイント記録の場合、新しいレコードを作成
            Point::create([
                'user_id' => $userId,
                'all_point' => $pointsEarned,
            ]);
        }
    }


}