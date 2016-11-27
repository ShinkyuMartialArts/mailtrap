<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUser()
    {
        $user = new \ShinkyuMartialArts\Mailtrap\Entities\User($this->apiUser());

        $this->assertAttributeEquals(1, 'id', $user);
        $this->assertAttributeEquals('Alexey Vasiliev', 'name', $user);
        $this->assertAttributeEquals('alexey.vasiliev@railsware.com', 'email', $user);
        $this->assertAttributeEquals(MailtrapTest::API_TOKEN, 'apiToken', $user);
        $this->assertAttributeEquals('http://www.gravatar.com/avatar/2b18d4346ca1ec18cb310cd86a51a4e2?s=100', 'gravatarIcon', $user);
        $this->assertAttributeEquals('http://www.gravatar.com/avatar/2b18d4346ca1ec18cb310cd86a51a4e2?s=30', 'gravatarLittleIcon', $user);
        $this->assertAttributeEquals(1355064377, 'createdAtInt', $user);
        $this->assertAttributeEquals('Europe/Kiev', 'timezone', $user);
        $this->assertAttributeEquals(7200, 'timezoneInInt', $user);
        $this->assertNull($user->getPendingEmail());
    }

    public function apiUser()
    {
        return json_decode('{
          "id": 1,
          "name": "Alexey Vasiliev",
          "email": "alexey.vasiliev@railsware.com",
          "api_token": "'. MailtrapTest::API_TOKEN .'",
          "gravatar_icon": "http://www.gravatar.com/avatar/2b18d4346ca1ec18cb310cd86a51a4e2?s=100",
          "gravatar_little_icon": "http://www.gravatar.com/avatar/2b18d4346ca1ec18cb310cd86a51a4e2?s=30",
          "created_at_int": 1355064377,
          "timezone": "Europe/Kiev",
          "timezone_in_int": 7200,
          "pending_email": null
        }', true);
    }

}
