<?php

namespace App\Modules\Sales\Core\Application\Service\GetAllSales;

use App\Exceptions\ExpectedException;
use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;
use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Sales\Core\Domain\Repository\IMitraRepository;
use App\Modules\Sales\Core\Domain\Repository\ISalesRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;

class GetAllSalesService
{
    private ISalesRepository $sales_repository;
    private IMitraRepository $mitra_repository;

    /**
     * @param Account $account
     * @return GetAllSalesResponse[]
     * @throws ExpectedException
     */
    public function execute(Account $account): array
    {
        $account->failIfNotClass(BusinessAccount::class, MitraAccount::class);
        switch (1) {
            case $account instanceof BusinessAccount:
                $mitras = $this->mitra_repository->getByBusinessId(new BusinessId($account->getRoleId()));
                $sales = [];
                foreach ($mitras as $mitra) {
                    $sales = array_merge($sales, $this->sales_repository->getByMitraId($mitra->getId()));
                }
                break;
            case $account instanceof MitraAccount:
                $sales = $this->sales_repository->getByMitraId(new MitraId($account->getRoleId()));
                break;
            default:
                throw new ExpectedException("unauthorized", 1019);
        }
        $responses = [];
        foreach ($sales as $sale) {
            $responses[] = new GetAllSalesResponse($sale->getMadeBy(), $sale->getCreatedAt(), $sale->getAmountToBePaid());
        }
        return $responses;
    }
}
