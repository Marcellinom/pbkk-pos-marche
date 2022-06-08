<?php

namespace App\Modules\IAM\Infra\Repository;

use App\Modules\IAM\Core\Domain\Model\Phone;
use App\Modules\IAM\Core\Domain\Model\User\User;
use App\Modules\IAM\Core\Domain\Model\User\UserId;
use App\Modules\IAM\Core\Domain\Model\User\UserType;
use App\Modules\IAM\Core\Domain\Repository\IUserRepository;
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
        return $row ? $this->buildFromRow($row) : null;
    }

    public function findByUsername(string $username): ?User
    {
        $row = $this->db->table('user')->where('username', $username)->where('soft_deleted', false)->first();
        return $row ? $this->buildFromRow($row) : null;
    }

    private function buildFromRow($row): User
    {
        return new User(
            new UserId($row->id),
            new UserType($row->user_type),
            new Phone($row->phone),
            $row->email,
            $row->username,
            (new \DateTime())->setTimestamp($row->created_at),
            $row->soft_deleted,
            $row->password
        );
    }

    public function persist(User $user): void
    {
        $this->db->table('user')->upsert([
            'id' => $user->getId()->toString(),
            'user_type' => $user->getType()->getValue(),
            'phone' =>$user->getPhone()->getNumber(),
            'name' => $user->getName(),
            'username' => $user->getUsername(),
            'created_at' => $user->getCreatedAt()->getTimestamp(),
            'soft_deleted' => $user->isSoftDeleted(),
            'password' => $user->getHashedPassword()
        ], 'id');
    }

    public function softDelete(User $user): void
    {
        // TODO: Implement softDelete() method.
    }
}
