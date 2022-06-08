<?php

namespace App\Modules\Inventory\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\Inventory\Core\Application\Service\AddItem\AddItemRequest;
use App\Modules\Inventory\Core\Application\Service\AddItem\AddItemService;
use App\Modules\Inventory\Core\Application\Service\EditItem\EditItemRequest;
use App\Modules\Inventory\Core\Application\Service\EditItem\EditItemService;
use App\Modules\Inventory\Core\Application\Service\FindItem\FindItemRequest;
use App\Modules\Inventory\Core\Application\Service\FindItem\FindItemService;
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

    /**
     * @throws ExpectedException
     */
    public function findItem(Request $request, FindItemService $service): JsonResponse
    {
        return $this->successWithData(
            $service->execute(
                new FindItemRequest($request->input('id_barang')),
                JwtDecoder::decode($request->header('token'))
            )
        );
    }

    /**
     * @throws Throwable
     * @throws ExpectedException
     */
    public function addItem(Request $request, AddItemService $service): JsonResponse
    {
        $input = new AddItemRequest(
            $request->input('name'),
            $request->input('price'),
            $request->input('quantity'),
            $request->input('unit'),
            $request->input('length'),
            $request->input('width'),
            $request->input('height'),
            $request->input('weight'),
            $request->input('inventory_id'),
            $request->input('photo')
        );

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

    /**
     * @throws Throwable
     * @throws ExpectedException
     */
    public function editItem(Request $request, EditItemService $service): JsonResponse
    {
        $input = new EditItemRequest(
            $request->input('item_id'),
            $request->input('name'),
            $request->input('sku_id'),
            $request->input('price'),
            $request->input('quantity'),
            $request->input('unit'),
            $request->input('length'),
            $request->input('width'),
            $request->input('height'),
            $request->input('weight'),
            $request->input('inventory_id'),
            $request->input('photo')
        );

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
