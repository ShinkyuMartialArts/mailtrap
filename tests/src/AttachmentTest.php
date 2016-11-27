<?php

use PHPUnit\Framework\TestCase;

class AttachmentTest extends TestCase
{
    public function testAttachment()
    {
        $attachment = new \ShinkyuMartialArts\Mailtrap\Entities\Attachment($this->apiAttachment());

        $this->assertAttributeEquals(1737, 'id', $attachment);
        $this->assertAttributeEquals(54508, 'messageId', $attachment);
        $this->assertAttributeEquals('Photos.png', 'filename', $attachment);
        $this->assertAttributeEquals('attachment', 'attachmentType', $attachment);
        $this->assertAttributeEquals('image/png', 'contentType', $attachment);
        $this->assertAttributeEquals('', 'contentId', $attachment);
        $this->assertAttributeEquals('base64', 'transferEncoding', $attachment);
        $this->assertAttributeEquals(213855, 'attachmentSize', $attachment);
        $this->assertAttributeEquals('2013-08-16T00:39:34.677+03:00', 'createdAt', $attachment);
        $this->assertAttributeEquals('2013-08-16T00:39:34.677+03:00', 'updatedAt', $attachment);
        $this->assertAttributeEquals('210 KB', 'attachmentHumanSize', $attachment);
        $this->assertAttributeEquals('/api/v1/inboxes/3/messages/54508/attachments/1737/download', 'downloadPath', $attachment);
    }

    public function apiAttachment()
    {
        return json_decode('{
          "id": 1737,
          "message_id": 54508,
          "filename": "Photos.png",
          "attachment_type": "attachment",
          "content_type": "image/png",
          "content_id": "",
          "transfer_encoding": "base64",
          "attachment_size": 213855,
          "created_at": "2013-08-16T00:39:34.677+03:00",
          "updated_at": "2013-08-16T00:39:34.677+03:00",
          "attachment_human_size": "210 KB",
          "download_path": "/api/v1/inboxes/3/messages/54508/attachments/1737/download"
        }', true);
    }

}
