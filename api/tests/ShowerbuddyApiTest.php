<?php
use App\OccupiedState;

/**
 * Class ShowerbuddyApiTest
 */
class ShowerbuddyApiTest extends TestCase
{

    public function testModelCanChangeStateAndSaveToDatabase()
    {
        OccupiedState::markAsOccupied();
        $this->assertTrue(OccupiedState::isOccupied());

        OccupiedState::markAsVacant();
        $this->assertFalse(OccupiedState::isOccupied());
    }

    public function testCanReturnCurrentStateFromApi()
    {
        OccupiedState::markAsOccupied();

        $this->get('/api/states/latest');
        $this->assertResponseOk();
        $this->seeJson(['is_occupied' => true]);
    }

    public function testCanSetAsVacant()
    {
        OccupiedState::markAsVacant();

        $this->json('POST', '/api/states/vacant');
        $this->assertResponseOk();
        $this->assertTrue(! OccupiedState::isOccupied());
    }

    public function testCanSetAsOccupied()
    {
        OccupiedState::markAsVacant();

        $this->json('POST', '/api/states/occupied');
        $this->assertResponseOk();
        $this->assertTrue(OccupiedState::isOccupied());
    }

    public function testCanServeViewWithOccupiedState()
    {
        OccupiedState::markAsOccupied();

        $this->get('/showerbuddy');
        $response = $this->response->getContent();
        $this->assertRegexp('/optaget/', $response);
    }

    public function testCanServeViewWithVacantState()
    {
        OccupiedState::markAsVacant();

        $this->get('/showerbuddy');
        $response = $this->response->getContent();
        $this->assertRegexp('/ledigt/', $response);
    }

}
