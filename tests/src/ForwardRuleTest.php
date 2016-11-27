<?php

use PHPUnit\Framework\TestCase;

class ForwardRuleTest extends TestCase
{
    public function testForwardRule()
    {
        $forwardRule = new \ShinkyuMartialArts\Mailtrap\Entities\ForwardRule($this->apiForwardRule());

        $this->assertAttributeEquals(2, 'id', $forwardRule);
        $this->assertAttributeEquals(1, 'inboxId', $forwardRule);
        $this->assertAttributeEquals('email', 'forwardType', $forwardRule);
        $this->assertAttributeEquals('forward@example.com', 'forwardValue', $forwardRule);
    }

    public function apiForwardRule()
    {
        return json_decode('{
          "id": 2,
          "inbox_id": 1,
          "forward_type": "email",
          "forward_value": "forward@example.com"
        }', true);
    }

}
