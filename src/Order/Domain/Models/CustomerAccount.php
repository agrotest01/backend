<?php
namespace Src\Order\Domain\Models;

class CustomerAccount
{
    public string $country_sys_name;

    public function __construct(
        public readonly string $tax_num
    ){
        $this->country_sys_name = substr($tax_num, 0, 2);
        // TODO: можно повесить валидацию с исключением на значение tax_num
    }
}
