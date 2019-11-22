<?php

namespace Utils\Validators;

class EmailValidator
{
    /** @var string $address */
    private $address = "";

    /** @var string $pattern */
    private $pattern = "";

    public function __construct(string $address, ?string $pattern = null)
    {
        $this->address = $address;
        if (is_string($pattern)) {
            $this->pattern = $pattern;
        }
    }

    public function validate()
    {
    }

    public function validateMX()
    {
    }
}