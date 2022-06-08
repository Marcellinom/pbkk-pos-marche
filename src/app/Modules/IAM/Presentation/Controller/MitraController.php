<?php

namespace App\Modules\IAM\Presentation\Controller;

use App\Http\Controllers\Controller;
use App\Modules\IAM\Core\Application\Service\CreateMitra\CreateMitraRequest;
use App\Modules\IAM\Core\Application\Service\CreateMitra\CreateMitraService;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function createMitra(Request $request, CreateMitraService $service)
    {
        $request = new CreateMitraRequest(
            $request->input("name"),
            $request->input("email"),
            $request->input("address"),
            $request->input("phone"),
            $request->input("username"),
            $request->input("password")
        );
    }
}
