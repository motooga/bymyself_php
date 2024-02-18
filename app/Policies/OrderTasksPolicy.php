<?php

namespace App\Policies;

use App\Models\Family;
use App\Models\Order_tasks;
use Illuminate\Auth\Access\Response;

class OrderTasksPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Family $family): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Family $family, Order_tasks $orderTasks): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Family $family): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Family $family, Order_tasks $orderTasks): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Family $family, Order_tasks $orderTasks): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Family $family, Order_tasks $orderTasks): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Family $family, Order_tasks $orderTasks): bool
    {
        //
    }
}
