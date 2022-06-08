<?php

use App\Modules\Business\Core\Domain\Repository\IMitraRepository;
use App\Modules\Business\Infra\SqlMitraRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;

/** @var Application $app */

$app->singleton(IMitraRepository::class, SqlMitraRepository::class);
$app->singleton(\App\Modules\Business\Core\Domain\Repository\IUserRepository::class, \App\Modules\Business\Infra\SqlUserRepository::class);

$app->when([
    SqlMitraRepository::class,
    \App\Modules\Business\Infra\SqlUserRepository::class,
])->needs(\Illuminate\Database\ConnectionInterface::class)
    ->give(function () {
        return DB::connection('business');
    });
