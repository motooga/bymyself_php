<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function oder_tasks() {
        return $this->hasMany(OrderTasks::class);
    }
    
    use HasFactory;
}
