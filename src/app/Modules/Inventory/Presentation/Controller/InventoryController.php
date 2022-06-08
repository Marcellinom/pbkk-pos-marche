<?php

namespace App\Modules\Inventory\Presentation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Inventory\Core\Application\Service\GetAllInventory\GetAllInventoryService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\uow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InventoryController extends Controller
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
     * @throws \App\Exceptions\ExpectedException
     */
    public function getAllInventory(Request $request, GetAllInventoryService $service): JsonResponse
    {
        return $this->successWithData($service->execute(JwtDecoder::decode($request->header('token'))));
    }
}
