<?php

namespace App\Modules\Business\Infra;

use App\Modules\Business\Core\Domain\Model\Business\BusinessId;
use App\Modules\Business\Core\Domain\Model\Mitra\Mitra;
use App\Modules\Business\Core\Domain\Model\Mitra\MitraId;
use App\Modules\Business\Core\Domain\Model\User\UserId;
use App\Modules\Business\Core\Domain\Repository\IMitraRepository;
use Illuminate\Database\ConnectionInterface;

class SqlMitraRepository implements IMitraRepository
{
    private ConnectionInterface $db;

    /**
     * @param ConnectionInterface $db
     */
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }

    public function find(MitraId $id): ?Mitra
    {
        $row = $this->db->table('mitra')->where('id', $id->toString())->where('soft_deleted', false)->first();
        return $row ? new Mitra(
            new MitraId($row->id),
            new UserId($row->user_id),
            new BusinessId($row->business_id),
            $row->name,
            $row->location,
            $row->soft_deleted
        ) : null;
    }

    public function getByBusinessId(BusinessId $business_id): array
    {
        $rows = $this->db->table('mitra')->where('business_id', $business_id->toString())->where('soft_deleted', false)->first();
        $res = [];
        foreach ($rows as $row) {
            $res[] = new Mitra(
                new MitraId($row->id),
                new UserId($row->user_id),
                new BusinessId($row->business_id),
                $row->name,
                $row->location,
                $row->soft_deleted
            );
        }
        return $res;
    }

    public function persist(Mitra $mitra): void
    {
        $this->db->table('mitra')->upsert([
            'id' => $mitra->getId()->toString(),
            'user_id' => $mitra->getUserId()->toString(),
            'business_id' => $mitra->getBusinessId()->toString(),
            'name' => $mitra->getName(),
            'location' => $mitra->getLocation(),
            'soft_deleted' => $mitra->isSoftDeleted()
        ], 'id');
    }

    public function softDelete(Mitra $mitra): void
    {
        // TODO: Implement softDelete() method.
    }
}
