<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function orders() {
        return $this->hasMany(Order::class);
    }

    use HasFactory;

    protected $fillable = [
        'task_name',
        'category',
        'type',
    ];

}
