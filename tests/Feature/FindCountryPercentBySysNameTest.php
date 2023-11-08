<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Src\Country\Application\UseCases\Queries\FindPercentByCountrySysNameQuery;
use Src\Country\Domain\Exceptions\IsNoteActiveException;
use Src\Country\Domain\Exceptions\SysNameNoteExistException;
use Tests\TestCase;

class FindCountryPercentBySysNameTest extends TestCase
{

    public function test_wrong_sys_key(): void
    {
        $this->expectException(SysNameNoteExistException::class);

        (new FindPercentByCountrySysNameQuery('wrong sys key'))->handle();
    }


    public function test_inactive_country(): void
    {
        $this->expectException(IsNoteActiveException::class);

        (new FindPercentByCountrySysNameQuery('ru'))->handle();
    }

    public function test_success_result() : void
    {
        $italy = DB::table('ref_countries')->where('sys_name', 'IT')->first();

        $percent =  (new FindPercentByCountrySysNameQuery('it'))->handle();

        $this->assertEquals($italy->tax_percent, $percent);
    }
}
