<?php

namespace App\Modules\Sales\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\Sales\Core\Application\Service\CreateSales\CreateSalesRequest;
use App\Modules\Sales\Core\Application\Service\CreateSales\CreateSalesService;
use App\Modules\Sales\Core\Application\Service\Dashboard\DashboardService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\uow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    private uow $uow;

    /**
     * @param uow $uow
     */
    public function __construct(uow $uow)
    {
        $this->uow = $uow;
    }

    /**
     * @throws ExpectedException
     */
    public function dashboard(Request $request, DashboardService $service): JsonResponse
    {
        return $this->successWithData(
            $service->execute(JwtDecoder::decode($request->header('token')))
        );
    }

    /**
     * @throws \Throwable
     * @throws ExpectedException
     */
    public function createSales(Request $request, CreateSalesService $service): JsonResponse
    {
        $input = [];
        foreach ($request->json() as $item) {
            $input[] = new CreateSalesRequest($item['id_barang'], $item['quantity']);
        }
        $this->uow->begin();
        try {
            $service->execute($input, JwtDecoder::decode($request->header('token')));
        } catch (\Throwable $e) {
            $this->uow->rollback();
            throw $e;
        }
        $this->uow->commit();
        return $this->success();
    }
}
