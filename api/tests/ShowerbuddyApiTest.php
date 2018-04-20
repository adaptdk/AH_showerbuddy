<?php

/**
 * Class ShowerbuddyApiTest
 */
class ShowerbuddyApiTest extends TestCase
{

    public function testCanReturnCurrentStateFromApi()
    {
        $this->get('/api/state');
        $this->assertResponseOk();
        $this->assertJson($this->response->getContent());
    }

}
