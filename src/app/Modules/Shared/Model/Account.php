<?php

namespace App\Modules\Shared\Model;

interface Account
{
    public function getUserId(): string;

    public function getRoleId(): string;

    public function getAccountType(): string;

    public function failIfNotClass(string ...$account): void;
}
