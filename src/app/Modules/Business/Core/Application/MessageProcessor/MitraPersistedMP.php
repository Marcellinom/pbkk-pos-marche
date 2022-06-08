<?php

namespace App\Modules\Business\Core\Application\MessageProcessor;

use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Model\Mitra\Mitra;
use App\Modules\Business\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Business\Core\Domain\Model\User\UserId;
use App\Modules\Business\Core\Domain\Repository\IMitraRepository;
use App\Modules\Shared\Handler\Messaging\MessageProcessor;
use App\Modules\Shared\Model\uow;

class MitraPersistedMP extends MessageProcessor
{
    private IMitraRepository $mitra_repository;

    /**
     * @param IMitraRepository $mitra_repository
     * @param uow $uow
     * @throws \App\Exceptions\ExpectedException
     */
    public function handle(IMitraRepository $mitra_repository, uow $uow)
    {
        $uow->begin();
        $this->mitra_repository = $mitra_repository;
        $msg = $this->getMessage()->getContent();
        $mitra = new Mitra(
            new MitraId($msg['id']),
            new UserId($msg['user_id']),
            new BusinessId($msg['business_id']),
            $msg['name'],
            $msg['location'],
            $msg['soft_deleted']
        );
        try {
            $this->mitra_repository->persist($mitra);
        } catch (\Throwable $exception) {
            $uow->rollback();
            throw $exception;
        }
        $uow->commit();
    }
}
