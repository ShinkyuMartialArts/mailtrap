<?php

use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    public function testMessage()
    {
        $inbox = new \ShinkyuMartialArts\Mailtrap\Entities\Message($this->apiMessage());

        $this->assertAttributeEquals(54864, 'id', $inbox);
        $this->assertAttributeEquals(1, 'inboxId', $inbox);
        $this->assertAttributeEquals('SMTP e-mail test', 'subject', $inbox);
        $this->assertAttributeEquals('2013-08-25T19:32:07.567+03:00', 'sentAt', $inbox);
        $this->assertAttributeEquals('me@railsware.com', 'fromEmail', $inbox);
        $this->assertAttributeEquals('Private Person', 'fromName', $inbox);
        $this->assertAttributeEquals('test@railsware.com', 'toEmail', $inbox);
        $this->assertAttributeEquals('A Test User', 'toName', $inbox);
        $this->assertAttributeEquals('', 'htmlBody', $inbox);
        $this->assertAttributeEquals('This is a test e-mail message.', 'textBody', $inbox);
        $this->assertAttributeEquals(193, 'emailSize', $inbox);
        $this->assertTrue($inbox->getIsRead());
        $this->assertAttributeEquals('2013-08-25T19:32:07.576+03:00', 'createdAt', $inbox);
        $this->assertAttributeEquals('2013-08-25T19:32:09.232+03:00', 'updatedAt', $inbox);
        $this->assertAttributeEquals(1377448326, 'sentAtTimestamp', $inbox);
        $this->assertAttributeEquals('193 Bytes', 'humanSize', $inbox);
        $this->assertAttributeEquals('/api/v1/inboxes/1/messages/54864/body.html', 'htmlPath', $inbox);
        $this->assertAttributeEquals('/api/v1/inboxes/1/messages/54864/body.txt', 'txtPath', $inbox);
        $this->assertAttributeEquals('/api/v1/inboxes/1/messages/54864/body.raw', 'rawPath', $inbox);
        $this->assertAttributeEquals('/api/v1/inboxes/1/messages/54864/body.eml', 'downloadPath', $inbox);
        $this->assertFalse($inbox->getVirusesReportInfo());
        $this->assertNotEmpty($inbox->getBlacklistsReportInfo());
    }

    public function apiMessage()
    {
        return json_decode('{
          "id": 54864,
          "inbox_id": 1,
          "subject": "SMTP e-mail test",
          "sent_at": "2013-08-25T19:32:07.567+03:00",
          "from_email": "me@railsware.com",
          "from_name": "Private Person",
          "to_email": "test@railsware.com",
          "to_name": "A Test User",
          "html_body": "",
          "text_body": "This is a test e-mail message.",
          "email_size": 193,
          "is_read": true,
          "created_at": "2013-08-25T19:32:07.576+03:00",
          "updated_at": "2013-08-25T19:32:09.232+03:00",
          "sent_at_timestamp": 1377448326,
          "human_size": "193 Bytes",
          "html_path": "/api/v1/inboxes/1/messages/54864/body.html",
          "txt_path": "/api/v1/inboxes/1/messages/54864/body.txt",
          "raw_path": "/api/v1/inboxes/1/messages/54864/body.raw",
          "download_path": "/api/v1/inboxes/1/messages/54864/body.eml",
          "viruses_report_info": false,
          "blacklists_report_info": {
            "result": "success",
            "domain": "railsware.com",
            "ip": "176.9.59.196",
            "report": [
              {
                "name": "AHBL",
                "url": "http://www.ahbl.org/",
                "in_black_list": false
              },
              {
                "name": "BACKSCATTERER",
                "url": "http://www.backscatterer.org/index.php",
                "in_black_list": false
              },
              {
                "name": "BARRACUDA",
                "url": "http://barracudacentral.org/rbl",
                "in_black_list": false
              },
              {
                "name": "BURNT-TECH",
                "url": "http://dnsbl.burnt-tech.com/",
                "in_black_list": false
              },
              {
                "name": "CASA-CBLPLUS",
                "url": "http://www.anti-spam.org.cn/CID/17",
                "in_black_list": false
              },
              {
                "name": "IMP-SPAM",
                "url": "http://antispam.imp.ch/?lng=1",
                "in_black_list": false
              },
              {
                "name": "INPS_DE",
                "url": "http://dnsbl.inps.de/index.cgi?lang=en",
                "in_black_list": false
              },
              {
                "name": "INVALUEMENT",
                "url": "http://dnsbl.invaluement.com/",
                "in_black_list": false
              },
              {
                "name": "LASHBACK",
                "url": "http://www.lashback.com/support/UnsubscribeBlacklistSupport.aspx",
                "in_black_list": false
              },
              {
                "name": "NIXSPAM",
                "url": "http://www.heise.de/ix/nixspam/dnsbl_en/",
                "in_black_list": false
              },
              {
                "name": "PSBL",
                "url": "http://psbl.surriel.com/",
                "in_black_list": false
              },
              {
                "name": "RATS-ALL",
                "url": "http://www.spamrats.com/",
                "in_black_list": false
              },
              {
                "name": "SEM-BACKSCATTER",
                "url": "http://spameatingmonkey.com/index.html",
                "in_black_list": false
              },
              {
                "name": "SEM-BLACK",
                "url": "http://spameatingmonkey.com/index.html",
                "in_black_list": false
              },
              {
                "name": "SORBS-DUHL",
                "url": "http://www.sorbs.net/lookup.shtml",
                "in_black_list": false
              },
              {
                "name": "SORBS-SPAM",
                "url": "http://www.sorbs.net/lookup.shtml",
                "in_black_list": false
              },
              {
                "name": "SPAMCANNIBAL",
                "url": "http://www.spamcannibal.org/",
                "in_black_list": false
              },
              {
                "name": "SPAMCOP",
                "url": "http://spamcop.net/bl.shtml",
                "in_black_list": false
              },
              {
                "name": "SPAMHAUS-ZEN",
                "url": "http://www.spamhaus.org/",
                "in_black_list": false
              },
              {
                "name": "TRUNCATE",
                "url": "http://www.gbudb.com/truncate/index.jsp",
                "in_black_list": false
              }
            ]
          }
        }', true);
    }

}
