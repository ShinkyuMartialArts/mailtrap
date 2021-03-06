<?php

use PHPUnit\Framework\TestCase;

class InboxTest extends TestCase
{
    public function testInbox()
    {
        $inbox = new \ShinkyuMartialArts\Mailtrap\Entities\Inbox($this->apiInbox());

        $this->assertAttributeEquals(3, 'id', $inbox);
        $this->assertAttributeEquals(1, 'companyId', $inbox);
        $this->assertAttributeEquals('Test inbox', 'name', $inbox);
        $this->assertAttributeEquals('mailtrap.io', 'domain', $inbox);
        $this->assertAttributeEquals('1da91769512fb', 'username', $inbox);
        $this->assertAttributeEquals('d71dfda027b54a', 'password', $inbox);
        $this->assertAttributeEquals('active', 'status', $inbox);
        $this->assertAttributeEquals(1000, 'maxSize', $inbox);
        $this->assertAttributeEquals(997, 'emailsCount', $inbox);
        $this->assertAttributeEquals(0, 'emailsUnreadCount', $inbox);
        $this->assertAttributeEquals('example-username', 'emailUsername', $inbox);
        $this->assertFalse($inbox->isEmailUsernameEnabled());
        $this->assertAttributeEquals('inbox.mailtrap.io', 'emailDomain', $inbox);
        $this->assertAttributeEquals(1380567707, 'lastMessageSentAtTimestamp', $inbox);
        $this->assertAttributeEquals([25, 465, 2525], 'smtpPorts', $inbox);
        $this->assertAttributeEquals([1100, 9950], 'pop3Ports', $inbox);
    }

    public function apiInbox()
    {
        return json_decode('{
            "id": 3,
            "company_id": 1,
            "name": "Test inbox",
            "domain": "mailtrap.io",
            "username": "1da91769512fb",
            "password": "d71dfda027b54a",
            "status": "active",
            "max_size": 1000,
            "emails_count": 997,
            "emails_unread_count": 0,
            "email_username": "example-username",
            "email_username_enabled": false,
            "email_domain": "inbox.mailtrap.io",
            "last_message_sent_at_timestamp": 1380567707,
            "smtp_ports": [
              25,
              465,
              2525
            ],
            "pop3_ports": [
              1100,
              9950
            ]
          }', true);
    }

}
