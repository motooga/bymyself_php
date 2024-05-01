<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function point_event() {
        return $this->belongsTo(Point_event::class, 'point_event_id');
    }

    protected $fillable = [
        'user_id','all_point'
    ];

}
