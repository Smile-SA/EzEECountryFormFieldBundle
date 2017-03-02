<?php

namespace Smile\EzEECountryFormFieldBundle\Validators;

use EzSystems\FormBuilder\Core\Validator\Validator;
use EzSystems\FormBuilder\SPI\ValidatorInterface;

class CountriesValidator extends Validator implements ValidatorInterface
{
    protected $countries;

    public function __construct($countries)
    {
        $this->countries = $countries;
    }

    public function getValueType()
    {
        return self::TYPE_ARRAY;
    }

    public function validate($value)
    {
        $value = !is_array($value) ? [$value] : $value;

        return empty(array_diff($value, array_keys($this->countries)));
    }

    public function getErrorMessage()
    {
        return 'Select values only from given options';
    }

    public function getLabel()
    {
        return 'Countries';
    }
}
