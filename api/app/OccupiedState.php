<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OccupiedState
 *
 * @package App
 */
class OccupiedState extends Model
{

    protected $fillable = ['is_occupied'];

    /**
     * @return mixed
     */
    public static function markAsOccupied()
    {
        return (bool) OccupiedState::create(['is_occupied' => true]);
    }

    /**
     * @return mixed
     */
    public static function markAsVacant()
    {
        return (bool) OccupiedState::create(['is_occupied' => false]);
    }

    /**
     * Determine if the state is set to occupied.
     *
     * @return bool
     */
    public static function isOccupied()
    {
        return (bool) OccupiedState::orderBy('id', 'desc')->first()->is_occupied;
    }
}
