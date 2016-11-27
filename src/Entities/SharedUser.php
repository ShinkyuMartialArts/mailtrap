<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class SharedUser
{
    use HydrateEntity;

    /**
     * @var int
     */
    protected $id;
    /**
     * @var int
     */
    protected $userId;
    /**
     * @var string
     */
    protected $role;
    /**
     * @var bool
     */
    protected $isOwner;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $email;

    /**
     * SharedUser constructor.
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
    public function getUserId(): int
    {
        return $this->userId ?: 0;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role ?: '';
    }

    /**
     * @return boolean
     */
    public function getIsOwner(): bool
    {
        return $this->isOwner ?: false;
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
    public function getEmail(): string
    {
        return $this->email ?: '';
    }

}
