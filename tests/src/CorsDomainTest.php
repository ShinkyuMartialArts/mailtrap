<?php

use PHPUnit\Framework\TestCase;

class CorsDomainTest extends TestCase
{
    public function testCorsDomain()
    {
        $inboxUser = new \ShinkyuMartialArts\Mailtrap\Entities\CorsDomain($this->apiCorsDomain());

        $this->assertAttributeEquals(19, 'id', $inboxUser);
        $this->assertAttributeEquals(1, 'userId', $inboxUser);
        $this->assertAttributeEquals('example.com', 'domain', $inboxUser);
    }

    public function apiCorsDomain()
    {
        return json_decode('{
          "id": 19,
          "user_id": 1,
          "domain": "example.com"
        }', true);
    }

}
