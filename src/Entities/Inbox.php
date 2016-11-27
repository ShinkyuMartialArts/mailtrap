<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class Inbox
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
     * @var string
     */
    protected $emailUsername;
    /**
     * @var bool
     */
    protected $emailUsernameEnabled;
    /**
     * @var string
     */
    protected $emailDomain;
    /**
     * @var int
     */
    protected $lastMessageSentAtTimestamp;
    /**
     * @var int[]
     */
    protected $smtpPorts;
    /**
     * @var int[]
     */
    protected $pop3Ports;

    /**
     * Inbox constructor.
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
     * @param mixed $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function getEmailUsername(): string
    {
        return $this->emailUsername ?: '';
    }

    /**
     * @param string $emailUsername
     */
    public function setEmailUsername(string $emailUsername)
    {
        $this->emailUsername = $emailUsername;
    }

    /**
     * @return boolean
     */
    public function isEmailUsernameEnabled(): bool
    {
        return $this->emailUsernameEnabled ?: false;
    }

    /**
     * @return string
     */
    public function getEmailDomain(): string
    {
        return $this->emailDomain ?: '';
    }

    /**
     * @return int
     */
    public function getLastMessageSentAtTimestamp(): int
    {
        return $this->lastMessageSentAtTimestamp ?: 0;
    }

    /**
     * @return \int[]
     */
    public function getSmtpPorts(): array
    {
        return $this->smtpPorts ?: [];
    }

    /**
     * @return \int[]
     */
    public function getPop3Ports(): array
    {
        return $this->pop3Ports ?: [];
    }

}
