<?php

namespace App\Modules\Business\Infra;

use App\Modules\Business\Core\Domain\Model\User\UserId;
use App\Modules\Business\Core\Domain\Model\User\User;
use App\Modules\Business\Core\Domain\Repository\IUserRepository;
use App\Modules\IAM\Core\Domain\Model\Phone;
use Illuminate\Database\ConnectionInterface;

class SqlUserRepository implements IUserRepository
{
    private ConnectionInterface $db;

    /**
     * @param ConnectionInterface $db
     */
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }

    public function find(UserId $id): ?User
    {
        $row = $this->db->table('user')->where('id', $id->toString())->where('soft_deleted', false)->first();
        return $row ? new User(
            new UserId($row->id),
            new Phone($row->phone),
            (new \DateTime())->setTimestamp($row->created_at),
            $row->name
        ) : null;
    }

    public function persist(User $user): void
    {
        $this->db->table('user')->upsert([
            'id' => $user->getId()->toString(),
            'phone' => $user->getPhone()->getNumber(),
            'created_at' => $user->getCreatedAt()->getTimestamp(),
            'name' => $user->getName()
        ], 'id');
    }

    public function softDelete(User $user): void
    {
        // TODO: Implement softDelete() method.
    }
}
