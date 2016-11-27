<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class Message
{
    use HydrateEntity;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $inboxId;
    /**
     * @var string
     */
    protected $subject;
    /**
     * @var string
     */
    protected $sentAt;
    /**
     * @var string
     */
    protected $fromEmail;
    /**
     * @var string
     */
    protected $fromName;
    /**
     * @var string
     */
    protected $toEmail;
    /**
     * @var string
     */
    protected $toName;
    /**
     * @var string
     */
    protected $htmlBody;
    /**
     * @var string
     */
    protected $textBody;
    /**
     * @var int
     */
    protected $emailSize;
    /**
     * @var bool
     */
    protected $isRead;
    /**
     * @var string
     */
    protected $createdAt;
    /**
     * @var string
     */
    protected $updatedAt;
    /**
     * @var int
     */
    protected $sentAtTimestamp;
    /**
     * @var string
     */
    protected $humanSize;
    /**
     * @var string
     */
    protected $htmlPath;
    /**
     * @var string
     */
    protected $txtPath;
    /**
     * @var string
     */
    protected $rawPath;
    /**
     * @var string
     */
    protected $downloadPath;
    /**
     * @var bool
     */
    protected $virusesReportInfo;
    /**
     * @var array
     */
    protected $blacklistsReportInfo;

    /**
     * Message constructor.
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
    public function getInboxId(): int
    {
        return $this->inboxId ?: 0;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject ?: '';
    }

    /**
     * @return string
     */
    public function getSentAt(): string
    {
        return $this->sentAt ?: '';
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail ?: '';
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName ?: '';
    }

    /**
     * @return string
     */
    public function getToEmail(): string
    {
        return $this->toEmail ?: '';
    }

    /**
     * @return string
     */
    public function getToName(): string
    {
        return $this->toName ?: '';
    }

    /**
     * @return string
     */
    public function getHtmlBody(): string
    {
        return $this->htmlBody ?: '';
    }

    /**
     * @return string
     */
    public function getTextBody(): string
    {
        return $this->textBody ?: '';
    }

    /**
     * @return int
     */
    public function getEmailSize(): int
    {
        return $this->emailSize ?: 0;
    }

    /**
     * @return boolean
     */
    public function getIsRead(): bool
    {
        return $this->isRead ?: false;
    }

    /**
     * @param boolean $isRead
     */
    public function setIsRead(bool $isRead)
    {
        $this->isRead = $isRead;
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
     * @return int
     */
    public function getSentAtTimestamp(): int
    {
        return $this->sentAtTimestamp ?: 0;
    }

    /**
     * @return string
     */
    public function getHumanSize(): string
    {
        return $this->humanSize ?: '';
    }

    /**
     * @return string
     */
    public function getHtmlPath(): string
    {
        return $this->htmlPath ?: '';
    }

    /**
     * @return string
     */
    public function getTxtPath(): string
    {
        return $this->txtPath ?: '';
    }

    /**
     * @return string
     */
    public function getRawPath(): string
    {
        return $this->rawPath ?: '';
    }

    /**
     * @return string
     */
    public function getDownloadPath(): string
    {
        return $this->downloadPath ?: '';
    }

    /**
     * @return bool
     */
    public function getVirusesReportInfo(): bool
    {
        return $this->virusesReportInfo ?: false;
    }

    /**
     * @return array
     */
    public function getBlacklistsReportInfo(): array
    {
        return $this->blacklistsReportInfo ?: [];
    }

}
