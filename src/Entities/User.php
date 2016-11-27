<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Api\Api;
use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class User
{
    use HydrateEntity;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $apiToken;
    /**
     * @var string
     */
    protected $gravatarIcon;
    /**
     * @var string
     */
    protected $gravatarLittleIcon;
    /**
     * @var int
     */
    protected $createdAtInt;
    /**
     * @var string
     */
    protected $timezone;
    /**
     * @var int
     */
    protected $timezoneInInt;
    /**
     * @var null|string
     */
    protected $pendingEmail;

    /**
     * User constructor.
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
     * @return string
     */
    public function getName(): string
    {
        return $this->name ?: '';
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email ?: '';
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getApiToken(): string
    {
        return $this->apiToken ?: '';
    }

    /**
     * @return string
     */
    public function getGravatarIcon(): string
    {
        return $this->gravatarIcon ?: '';
    }

    /**
     * @return string
     */
    public function getGravatarLittleIcon(): string
    {
        return $this->gravatarLittleIcon ?: '';
    }

    /**
     * @return int
     */
    public function getCreatedAtInt(): int
    {
        return $this->createdAtInt ?: 0;
    }

    /**
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone ?: Api::DEFAULT_TIMEZONE;
    }

    /**
     * @return int
     */
    public function getTimezoneInInt(): int
    {
        return $this->timezoneInInt ?: 0;
    }

    /**
     * @return null|string
     */
    public function getPendingEmail()
    {
        return $this->pendingEmail;
    }

}
