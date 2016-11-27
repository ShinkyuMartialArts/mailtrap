<?php

use PHPUnit\Framework\TestCase;

class SharedUserTest extends TestCase
{
    public function testSharedUser()
    {
        $sharedUser = new \ShinkyuMartialArts\Mailtrap\Entities\SharedUser($this->apiSharedUser());

        $this->assertAttributeEquals(20, 'id', $sharedUser);
        $this->assertAttributeEquals(1, 'userId', $sharedUser);
        $this->assertAttributeEquals('user', 'role', $sharedUser);
        $this->assertFalse($sharedUser->getIsOwner());
        $this->assertAttributeEquals('Alex Chaplinsky', 'name', $sharedUser);
        $this->assertAttributeEquals('user@example.com', 'email', $sharedUser);
    }

    public function apiSharedUser()
    {
        return json_decode('{
          "id": 20,
          "user_id": 1,
          "role": "user",
          "is_owner": false,
          "name": "Alex Chaplinsky",
          "email": "user@example.com"
        }', true);
    }

}
