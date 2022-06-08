<?php

namespace App\Modules\Business\Presentation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\Business\Core\Application\Service\GetAllMitra\GetAllMitraService;
use App\Modules\Shared\Handler\Jwt\JwtDecoder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function getAllMitra(Request $request, GetAllMitraService $service): JsonResponse
    {
        return $this->successWithData($service->execute(JwtDecoder::decode($request->header('token'))));
    }
}
