<?php
namespace Src\Country\Application\Repositories;

use Illuminate\Support\Facades\DB;
use Src\Country\Domain\Exceptions\SysNameNoteExistException;
use Src\Country\Domain\Models\Country;
use Src\Country\Domain\Repositories\CountryRepositoryInterface;

class CountryRepository implements CountryRepositoryInterface
{
    public function getItemBySysName(string $sys_name): Country
    {
        $item = DB::table('ref_countries')->where('sys_name', $sys_name)->first();
        if (!$item)
            throw new SysNameNoteExistException($sys_name);

        return new Country(
            $item->id,
            $item->name,
            $item->sys_name,
            $item->tax_percent,
            $item->is_active
        );
    }
}
