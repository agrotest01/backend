<?php

namespace Src\Product\Domain\Exceptions;

use Src\Product\Domain\Models\Product;

class IsNoteActiveException extends \DomainException
{
    public function __construct(Product $product)
    {
        parent::__construct(sprintf('Selected product "%s" is note active', $product->name));
    }
}
