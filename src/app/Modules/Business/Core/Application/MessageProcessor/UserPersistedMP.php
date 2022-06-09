<?php

namespace App\Modules\Business\Core\Application\MessageProcessor;

use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Model\Staff\Staff;
use App\Modules\Business\Core\Domain\Model\Staff\StaffId;
use App\Modules\Business\Core\Domain\Model\User\User;
use App\Modules\Business\Core\Domain\Model\User\UserId;
use App\Modules\Business\Core\Domain\Repository\IUserRepository;
use App\Modules\IAM\Core\Domain\Model\Phone;
use App\Modules\Shared\Handler\Messaging\MessageProcessor;
use App\Modules\Shared\Model\uow;

class UserPersistedMP extends MessageProcessor
{
    private IUserRepository $user_repository;

    /**
     * @param IUserRepository $user_repository
     * @throws \App\Exceptions\ExpectedException
     */
    public function handle(IUserRepository $user_repository, uow $uow)
    {
        $this->user_repository = $user_repository;
        $uow->begin();
        $msg = $this->getMessage()->getContent();
        $staff = new User(
            new UserId($msg['id']),
            new Phone($msg['phone']),
            (new \DateTime())->setTimestamp($msg['created_at']),
            $msg['name']
        );
        try {
            $this->user_repository->persist($staff);
        } catch (\Throwable $exception) {
            $uow->rollback();
            throw $exception;
        }
        $uow->commit();
    }
}
