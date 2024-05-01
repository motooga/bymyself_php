<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_event extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function task() {
        return $this->belongsTo(Task::class, 'task_id');
    }
    public function report() {
        return $this->hasMany(Report::class);
    }
    public function point() {
        return $this->belongsTo(Point::class);
    }
    protected $fillable = [
        'type', 'point', 'report_id', 'user_id'
    ];
}
