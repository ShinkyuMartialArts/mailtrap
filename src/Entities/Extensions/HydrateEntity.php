<?php

namespace ShinkyuMartialArts\Mailtrap\Entities\Extensions;

use ShinkyuMartialArts\Mailtrap\Api\Api;
use ShinkyuMartialArts\Mailtrap\Entities\Inbox;

trait HydrateEntity
{
    protected $collections = [
        'inboxes' => Inbox::class,
    ];

    /**
     * @param array $attributes
     * @return $this
     */
    public function hydrate(array $attributes = [])
    {
        foreach ($attributes as $attribute => $value) {

            $attribute = ucwords(str_replace('_', ' ', strtolower($attribute)));
            $attribute = lcfirst(str_replace(' ', '', $attribute));

            if (property_exists($this, $attribute)) {
                if (in_array($attribute, array_keys($this->collections), true) && is_array($value)) {
                    $this->{$attribute} = Api::collection($this->collections[$attribute], $value);
                    continue;
                }

                $this->{$attribute} = $value;
            }
        }

        return $this;
    }

}
