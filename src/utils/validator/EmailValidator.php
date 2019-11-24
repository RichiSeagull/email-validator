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

    /**
     * @throws EmailValidatorException
     */
    public function validateAddress()
    {
        if (
            (!empty($this->pattern) && preg_match($this->pattern, $this->address) === false) OR
            (filter_var($this->address, FILTER_VALIDATE_EMAIL) === false)
        ) {
            throw new EmailValidatorException($this->address);
        }
    }

    /**
     * @throws EmailValidatorException
     */
    public function validateMX()
    {
        if (substr_count($this->address, "@") === 1) {
            $pos = strpos($this->address, "@");
            $domainName = substr($this->address, $pos);
            if (getmxrr($domainName, $mxRecords)) return;
        }
        throw new EmailValidatorException($this->address);
    }
}