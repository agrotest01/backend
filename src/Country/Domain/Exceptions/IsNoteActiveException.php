<?php

namespace Src\Country\Domain\Exceptions;

use Src\Country\Domain\Models\Country;

class IsNoteActiveException extends \DomainException
{
    public function __construct(Country $country)
    {
        parent::__construct(sprintf('Selected country "%s" is note active', $country->name));
    }
}
