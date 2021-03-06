<?php

namespace App\Http\Controllers;

use App\OccupiedState;
use Laravel\Lumen\Testing\DatabaseTransactions;

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
        return ['isOccupied' => OccupiedState::isOccupied()];
    }

}
