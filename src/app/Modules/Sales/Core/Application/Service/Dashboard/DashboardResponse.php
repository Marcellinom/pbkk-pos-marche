<?php

namespace App\Modules\Sales\Core\Application\Service\Dashboard;

use JsonSerializable;

class DashboardResponse implements JsonSerializable
{
    private float $total_sales_day;
    private float $total_sales_week;
    private float $total_sales_month;
    private float $total_earning;

    /**
     * @param float $total_sales_day
     * @param float $total_sales_week
     * @param float $total_sales_month
     * @param float $total_earning
     */
    public function __construct(float $total_sales_day, float $total_sales_week, float $total_sales_month, float $total_earning)
    {
        $this->total_sales_day = $total_sales_day;
        $this->total_sales_week = $total_sales_week;
        $this->total_sales_month = $total_sales_month;
        $this->total_earning = $total_earning;
    }

    public function jsonSerialize(): array
    {
        return [
            "total_sales_day" => $this->total_sales_day,
            "total_sales_week" => $this->total_sales_week,
            "total_sales_month" => $this->total_sales_month,
            "total_earning" => $this->total_earning,
        ];
    }
}
