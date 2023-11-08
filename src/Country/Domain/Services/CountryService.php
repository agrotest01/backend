<?php
namespace Src\Country\Domain\Services;

use Src\Country\Domain\Exceptions\IsNoteActiveException;
use Src\Country\Domain\Repositories\CountryRepositoryInterface;

final class CountryService {

    public static function getPercentBySysName(
        CountryRepositoryInterface $countryRepository,
        string $sys_name
    ) : float {
        $country = $countryRepository->getItemBySysName($sys_name);

        if (!$country->is_active)
            throw new IsNoteActiveException($country);

        return $country->tax_percent;
    }
}
