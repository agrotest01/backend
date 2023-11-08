<?php
namespace Src\Product\Domain\Models;

class Product {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly float $price,
        public readonly bool $is_active
    ){}
}
