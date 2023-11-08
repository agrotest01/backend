<?php

namespace Src\Country\Domain\Exceptions;

class SysNameNoteExistException extends \DomainException
{
    public function __construct(string $sys_name)
    {
        parent::__construct(sprintf('Cannot found country by sys_name: %s', $sys_name));
    }
}
