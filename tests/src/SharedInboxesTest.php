<?php

use PHPUnit\Framework\TestCase;

class SharedInboxesTest extends TestCase
{
    public function testSharedInboxes()
    {
        $sharedInboxes = ShinkyuMartialArts\Mailtrap\Api\Api::collection(
            \ShinkyuMartialArts\Mailtrap\Entities\SharedInbox::class,
            $this->apiSharedInbox()
        );

        $this->assertAttributeEquals(1, 'id', $sharedInboxes[0]);
        $this->assertAttributeEquals(1, 'companyId', $sharedInboxes[0]);
        $this->assertAttributeEquals('Staging', 'name', $sharedInboxes[0]);
        $this->assertAttributeEquals('mailtrap.io', 'domain', $sharedInboxes[0]);
        $this->assertAttributeEquals('test', 'username', $sharedInboxes[0]);
        $this->assertAttributeEquals('test', 'password', $sharedInboxes[0]);
        $this->assertAttributeEquals('active', 'status', $sharedInboxes[0]);
        $this->assertAttributeEquals(100, 'maxSize', $sharedInboxes[0]);
        $this->assertAttributeEquals(23, 'emailsCount', $sharedInboxes[0]);
        $this->assertAttributeEquals(0, 'emailsUnreadCount', $sharedInboxes[0]);
        $this->assertAttributeEquals(1399380496, 'lastMessageSentAtTimestamp', $sharedInboxes[0]);
        $this->assertAttributeEquals('Name', 'companyName', $sharedInboxes[0]);
    }

    public function apiSharedInbox()
    {
        return json_decode('[
          {
            "id": 1,
            "company_id": 1,
            "name": "Staging",
            "domain": "mailtrap.io",
            "username": "test",
            "password": "test",
            "status": "active",
            "max_size": 100,
            "emails_count": 23,
            "emails_unread_count": 0,
            "last_message_sent_at_timestamp": 1399380496,
            "company_name": "Name"
          }
        ]', true);
    }

}
