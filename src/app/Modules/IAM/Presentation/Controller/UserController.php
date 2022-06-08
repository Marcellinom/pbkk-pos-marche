<?php

namespace App\Modules\IAM\Presentation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\IAM\Core\Application\Service\Login\LoginRequest;
use App\Modules\IAM\Core\Application\Service\Login\LoginService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @throws \App\Exceptions\ExpectedException
     */
    public function login(Request $request, LoginService $service): JsonResponse
    {
        return $this->successWithData(
            $service->execute(new LoginRequest($request->input('username'), $request->input('password')))
        );
    }
}
