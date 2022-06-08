<?php

namespace App\Modules\Sales\Core\Application\Service\Dashboard;

use App\Modules\Sales\Core\Domain\Model\Business\BusinessId;
use App\Modules\Sales\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Sales\Core\Domain\Repository\IMitraRepository;
use App\Modules\Sales\Core\Domain\Repository\ISalesRepository;
use App\Modules\Shared\Model\Account;
use App\Modules\Shared\Model\RoleAccount\BusinessAccount;
use App\Modules\Shared\Model\RoleAccount\MitraAccount;
use Illuminate\Database\ConnectionInterface;

class DashboardService
{
    private IMitraRepository $mitra_repository;
    private ISalesRepository $sales_repository;
    private ConnectionInterface $db;

    /**
     * @param IMitraRepository $mitra_repository
     * @param ISalesRepository $sales_repository
     * @param ConnectionInterface $db
     */
    public function __construct(IMitraRepository $mitra_repository, ISalesRepository $sales_repository, ConnectionInterface $db)
    {
        $this->mitra_repository = $mitra_repository;
        $this->sales_repository = $sales_repository;
        $this->db = $db;
    }

    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function execute(Account $account): DashboardResponse
    {
        $account->failIfNotClass(BusinessAccount::class, MitraAccount::class);
        $mitra_ids = [];
        if ($account instanceof BusinessAccount) {
            $mitras = $this->mitra_repository->getByBusinessId(new BusinessId($account->getRoleId()));
            foreach ($mitras as $mitra) {
                $mitra_ids[] = $mitra->getId();
            }
        } else {
            $mitra_ids[] = new MitraId($account->getRoleId());
        }
        $sales_day = 0;
        $sales_week = 0;
        $sales_month = 0;
        $total_earnings = 0;
        foreach ($mitra_ids as $mitra_id) {
            $daily = $this->db->select("
                select DATEPART(day, created_at) as day, count(id) as jumlah from sales
                where mitra_id = ?
                order by DATEPART(day, created_at) desc
                group by DATEPART(day, created_at)
            ");
            $weekly = $this->db->select("
                select DATEPART(week, created_at) as week, count(id) as jumlah from sales
                where mitra_id = ?
                order by DATEPART(week, created_at) desc
                group by DATEPART(week, created_at)
            ");
            $monthly = $this->db->select("
                select DATEPART(month, created_at) as month, count(id) as jumlah from sales
                where mitra_id = ?
                order by DATEPART(month, created_at) desc
                group by DATEPART(month, created_at)
            ");
            $sales = $this->sales_repository->getByMitraId($mitra_id);

            $sales_day += $daily[0]->jumlah;
            $sales_week += $weekly[0]->jumlah;
            $sales_month += $monthly[0]->jumlah;
            foreach ($sales as $sale) {
                $total_earnings += $sale->getAmountToBePaid();
            }
        }
        return new DashboardResponse(
            $sales_day,
            $sales_week,
            $sales_month,
            $total_earnings
        );
    }
}
