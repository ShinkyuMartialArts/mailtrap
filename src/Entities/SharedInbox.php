<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class SharedInbox
{
    use HydrateEntity;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $companyId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $domain;
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var string
     */
    protected $status;
    /**
     * @var int
     */
    protected $maxSize;
    /**
     * @var int
     */
    protected $emailsCount;
    /**
     * @var int
     */
    protected $emailsUnreadCount;
    /**
     * @var int
     */
    protected $lastMessageSentAtTimestamp;
    /**
     * @var string
     */
    protected $companyName;

    /**
     * SharedInbox constructor.
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
    public function getCompanyId(): int
    {
        return $this->companyId ?: 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name ?: '';
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain ?: '';
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username ?: '';
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password ?: '';
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status ?: '';
    }

    /**
     * @return int
     */
    public function getMaxSize(): int
    {
        return $this->maxSize ?: 0;
    }

    /**
     * @return int
     */
    public function getEmailsCount(): int
    {
        return $this->emailsCount ?: 0;
    }

    /**
     * @return int
     */
    public function getEmailsUnreadCount(): int
    {
        return $this->emailsUnreadCount ?: 0;
    }

    /**
     * @return int
     */
    public function getLastMessageSentAtTimestamp(): int
    {
        return $this->lastMessageSentAtTimestamp ?: 0;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName ?: '';
    }

}
