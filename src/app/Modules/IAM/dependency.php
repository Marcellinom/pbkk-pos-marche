<?php

use Illuminate\Contracts\Foundation\Application;

/** @var Application $app */

$app->singleton(\App\Modules\IAM\Core\Domain\Service\IJwtGenerator::class, \App\Modules\IAM\Infra\Service\JwtGenerator::class);
