<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class InboxUser
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
    protected $createdAt;
    /**
     * @var string
     */
    protected $updatedAt;
    /**
     * @var string
     */
    protected $email;

    /**
     * InboxUser constructor.
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
    public function getEmail(): string
    {
        return $this->email ?: '';
    }

}
