<?php

namespace App\Modules\Sales\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
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
}
