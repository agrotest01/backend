<?php
namespace Src\Country\Domain\Models;

class Country {
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $sys_key,
        public readonly float $tax_percent,
        public readonly bool $is_active
    ){}
}
