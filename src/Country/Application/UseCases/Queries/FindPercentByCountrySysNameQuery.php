<?php
namespace Src\Country\Application\UseCases\Queries;

use Src\Common\Domain\QueryInterface;
use Src\Country\Domain\Repositories\CountryRepositoryInterface;
use Src\Country\Domain\Services\CountryService;

class FindPercentByCountrySysNameQuery implements QueryInterface
{
    private CountryRepositoryInterface $countryRepository;
    private readonly string $sys_name;

    public function __construct(string $sys_name)
    {
        $this->sys_name = strtoupper($sys_name);
        $this->countryRepository = app()->make(CountryRepositoryInterface::class);
    }

    public function handle(): float
    {
       return CountryService::getPercentBySysName($this->countryRepository, $this->sys_name);
    }
}
