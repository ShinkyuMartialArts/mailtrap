<?php

namespace ShinkyuMartialArts\Mailtrap\Entities;

use ShinkyuMartialArts\Mailtrap\Entities\Extensions\HydrateEntity;

class ForwardRule
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
    protected $forwardType;
    /**
     * @var string
     */
    protected $forwardValue;

    /**
     * ForwardRule constructor.
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
    public function getForwardType(): string
    {
        return $this->forwardType ?: '';
    }

    /**
     * @param string $forwardType
     */
    public function setForwardType(string $forwardType)
    {
        $this->forwardType = $forwardType;
    }

    /**
     * @return string
     */
    public function getForwardValue(): string
    {
        return $this->forwardValue ?: '';
    }

    /**
     * @param string $forwardValue
     */
    public function setForwardValue(string $forwardValue)
    {
        $this->forwardValue = $forwardValue;
    }

}
