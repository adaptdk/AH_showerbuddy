<?php

namespace App\Http\Controllers;

/**
 * Class ShowerbuddyController
 *
 * @package App\Http\Controllers
 */
class ShowerbuddyController extends Controller
{

    /**
     * Returns the current occupation state of the bathroom.
     *
     * @return array
     */
    public function currentState()
    {
        return ['isOccupied' => ! rand(0, 1)];
    }

    public function setAsOccupied()
    {
        // Set the isOccupied state to true
        return true;
    }

}
