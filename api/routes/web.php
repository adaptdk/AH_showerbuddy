<?php

/*
|--------------------------------------------------------------------------
| Showerbuddy API routes
|--------------------------------------------------------------------------
*/
use App\OccupiedState;

$router->get('/api/states/latest', function () {
    return ['is_occupied' => OccupiedState::isOccupied()];
});

$router->post('/api/states/occupied', function () {
    OccupiedState::markAsOccupied();
});

$router->post('/api/states/vacant', function () {
    OccupiedState::markAsVacant();
});

/*
|--------------------------------------------------------------------------
| Showerbuddy web routes
|--------------------------------------------------------------------------
*/
$router->get('/showerbuddy', function ()  {
    return view('showerbuddy');
});

