<?php

use PHPUnit\Framework\TestCase;

class InboxUserTest extends TestCase
{
    public function testInboxUser()
    {
        $inboxUser = new \ShinkyuMartialArts\Mailtrap\Entities\InboxUser($this->apiInboxUser());

        $this->assertAttributeEquals(1, 'id', $inboxUser);
        $this->assertAttributeEquals(8, 'inboxId', $inboxUser);
        $this->assertAttributeEquals('2014-05-31T20:03:20.186Z', 'createdAt', $inboxUser);
        $this->assertAttributeEquals('2014-05-31T20:03:20.186Z', 'updatedAt', $inboxUser);
        $this->assertAttributeEquals('example@example.com', 'email', $inboxUser);
    }

    public function apiInboxUser()
    {
        return json_decode('{
            "id": 1,
            "inbox_id": 8,
            "created_at": "2014-05-31T20:03:20.186Z",
            "updated_at": "2014-05-31T20:03:20.186Z",
            "email": "example@example.com"
        }', true);
    }

}
