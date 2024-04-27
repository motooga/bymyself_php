<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    public function order() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function task() {
        return $this->belongsTo(Task::class , 'task_id');
    }

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }
    use HasFactory;



    protected $fillable = [
        'order_id',
        'user_id',
        'reportphoto_url',
        'memo',
        'is_done',
    ];
}
