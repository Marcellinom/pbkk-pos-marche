<?php

namespace App\Modules\Inventory\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\Inventory\Core\Application\Service\GetAllItem\GetAllItemRequest;
use App\Modules\Inventory\Core\Application\Service\GetAllItem\GetAllItemService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\uow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ItemController extends Controller
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
    public function getAllItem(Request $request, GetAllItemService $service): JsonResponse
    {
        $input = new GetAllItemRequest($request->input('id_gudang'));
        return $this->successWithData(
            $service->execute($input, JwtDecoder::decode($request->header('token')))
        );
    }
}
