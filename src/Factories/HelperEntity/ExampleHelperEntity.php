<?php

namespace tapha\MetaPack\Factories\HelperEntity;

class ExampleHelperEntity
{
    /**
     * Locale
     * 
     * @var string
     */
    public $locale;

    /**
     * Objects
     *
     * @var array
     */
    public $objects;

    /**
     * ExampleHelperEntity constructor.
     * @param string $locale
     * @param array $objects
     */
    public function __construct(string $locale, array $objects)
    {
        $this->locale = $locale;
        $this->objects = $objects;
    }
}
