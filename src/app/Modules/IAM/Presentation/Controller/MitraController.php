<?php

namespace App\Modules\IAM\Presentation\Controller;

use App\Exceptions\ExpectedException;
use App\Http\Controllers\Controller;
use App\Modules\IAM\Core\Application\Service\CreateMitra\CreateMitraRequest;
use App\Modules\IAM\Core\Application\Service\CreateMitra\CreateMitraService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use App\Modules\Shared\Model\uow;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class MitraController extends Controller
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
     * @throws Throwable
     * @throws ExpectedException
     */
    public function createMitra(Request $request, CreateMitraService $service): JsonResponse
    {
        $input = new CreateMitraRequest(
            $request->input("name"),
            $request->input("email"),
            $request->input("address"),
            $request->input("phone"),
            $request->input("username"),
            $request->input("password"),
            $request->input("inventory_id")
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
