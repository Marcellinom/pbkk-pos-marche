<?php

use App\Modules\IAM\Core\Domain\Repository\IMitraRepository;
use App\Modules\IAM\Core\Domain\Repository\IUserRepository;
use App\Modules\IAM\Core\Domain\Service\IJwtGenerator;
use App\Modules\IAM\Infra\Repository\SqlMitraRepository;
use App\Modules\IAM\Infra\Repository\SqlUserRepository;
use App\Modules\IAM\Infra\Service\JwtGenerator;
use App\Modules\IAM\Presentation\Controller\MitraController;
use App\Modules\IAM\Presentation\Controller\UserController;
use App\Modules\Shared\Model\uow;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Support\Facades\DB;

/** @var Application $app */

$app->singleton(IJwtGenerator::class, JwtGenerator::class);
$app->singleton(IUserRepository::class, SqlUserRepository::class);
$app->singleton(IMitraRepository::class, SqlMitraRepository::class);

$app->when([
    SqlMitraRepository::class,
    SqlUserRepository::class,
])->needs(ConnectionInterface::class)
    ->give(function () {
        return DB::connection('iam');
    });

$app->when([
    MitraController::class,
    UserController::class,
])->needs(uow::class)
    ->give(function () {
        return uow::instance(DB::connection('iam'));
    });
