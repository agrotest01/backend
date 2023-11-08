<?php
namespace Src\Country\Domain\Repositories;

use Src\Country\Domain\Models\Country;

interface CountryRepositoryInterface {
    public function getItemBySysName(string $sys_name) : Country;
}
