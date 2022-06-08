<?php

namespace App\Modules\Inventory\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\Inventory\Core\Application\Service\CreateInventory\CreateInventoryRequest;
use App\Modules\Inventory\Core\Application\Service\CreateInventory\CreateInventoryService;
use App\Modules\Inventory\Core\Application\Service\GetAllInventory\GetAllInventoryService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\uow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

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
     * @throws ExpectedException
     */
    public function getAllInventory(Request $request, GetAllInventoryService $service): JsonResponse
    {
        return $this->successWithData($service->execute(JwtDecoder::decode($request->header('token'))));
    }

    /**
     * @throws Throwable
     * @throws ExpectedException
     */
    public function createInventory(Request $request, CreateInventoryService $service): JsonResponse
    {
        $input = new CreateInventoryRequest($request->input('name'), $request->input('address'));
        $this->uow->begin();
        try {
            $service->execute($input, JwtDecoder::decode($request->header('token')));
        } catch (Throwable $e) {
            $this->uow->rollback();
            throw $e;
        }
        $this->uow->commit();
        return $this->success();
    }
}
