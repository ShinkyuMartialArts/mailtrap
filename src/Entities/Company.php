<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class Company
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
     * @var bool
     */
    protected $isOwner;
    /**
     * @var string
     */
    protected $shareLink;
    /**
     * @var string
     */
    protected $extId;
    /**
     * @var Inbox[]
     */
    protected $inboxes;

    /**
     * Company constructor.
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
     * @return boolean
     */
    public function isIsOwner(): bool
    {
        return $this->isOwner ?: false;
    }

    /**
     * @return string
     */
    public function getShareLink(): string
    {
        return $this->shareLink ?: '';
    }

    /**
     * @return string
     */
    public function getExtId(): string
    {
        return $this->extId ?: '';
    }

    /**
     * @return Inbox[]
     */
    public function getInboxes(): array
    {
        return $this->inboxes ?: [];
    }

}
