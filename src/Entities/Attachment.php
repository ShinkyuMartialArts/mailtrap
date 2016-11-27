<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class Attachment
{
    use HydrateEntity;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $messageId;
    /**
     * @var string
     */
    protected $filename;
    /**
     * @var string
     */
    protected $attachmentType;
    /**
     * @var string
     */
    protected $contentType;
    /**
     * @var string
     */
    protected $contentId;
    /**
     * @var string
     */
    protected $transferEncoding;
    /**
     * @var int
     */
    protected $attachmentSize;
    /**
     * @var string
     */
    protected $createdAt;
    /**
     * @var string
     */
    protected $updatedAt;
    /**
     * @var string
     */
    protected $attachmentHumanSize;
    /**
     * @var string
     */
    protected $downloadPath;

    /**
     * Attachment constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        return $this->hydrate($attributes);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id ?: 0;
    }

    /**
     * @return int
     */
    public function getMessageId(): int
    {
        return $this->messageId ?: 0;
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename ?: '';
    }

    /**
     * @return string
     */
    public function getAttachmentType(): string
    {
        return $this->attachmentType ?: '';
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType ?: '';
    }

    /**
     * @return string
     */
    public function getContentId(): string
    {
        return $this->contentId ?: '';
    }

    /**
     * @return string
     */
    public function getTransferEncoding(): string
    {
        return $this->transferEncoding ?: '';
    }

    /**
     * @return int
     */
    public function getAttachmentSize(): int
    {
        return $this->attachmentSize ?: 0;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt ?: '';
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt ?: '';
    }

    /**
     * @return string
     */
    public function getAttachmentHumanSize(): string
    {
        return $this->attachmentHumanSize ?: '';
    }

    /**
     * @return string
     */
    public function getDownloadPath(): string
    {
        return $this->downloadPath ?: '';
    }

}
