<?php

namespace App\Policies;

use App\Models\Family;
use App\Models\Point_event;
use Illuminate\Auth\Access\Response;

class PointEventPolicy
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
    public function view(Family $family, Point_event $pointEvent): bool
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
    public function update(Family $family, Point_event $pointEvent): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Family $family, Point_event $pointEvent): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Family $family, Point_event $pointEvent): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Family $family, Point_event $pointEvent): bool
    {
        //
    }
}
