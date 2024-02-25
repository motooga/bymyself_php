<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function family() {
        return $this->belongsTo(Family::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function task() {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function report() {
        return $this->hasMany(Report::class);
    }

    protected $fillable = [
        'task_id',
        'user_id',
        'set_point',
        'start_date',
        'end_date',
    ];

}
