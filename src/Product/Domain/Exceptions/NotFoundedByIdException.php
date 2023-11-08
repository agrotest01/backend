<?php

namespace Src\Product\Domain\Exceptions;

class NotFoundedByIdException extends \DomainException
{
    public function __construct(int $id)
    {
        parent::__construct(sprintf('Can not found product "%d" is note active', $id));
    }
}
