<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class CorsDomain
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
    protected $domain;

    /**
     * CorsDomain constructor.
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
    public function getDomain(): string
    {
        return $this->domain ?: '';
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain)
    {
        $this->domain = $domain;
    }

}
