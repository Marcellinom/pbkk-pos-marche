<?php

namespace App\Modules\IAM\Infra\Repository;

use App\Modules\IAM\Core\Domain\Model\Business\BusinessId;
use App\Modules\IAM\Core\Domain\Model\Inventory\InventoryId;
use App\Modules\IAM\Core\Domain\Model\Mitra\Mitra;
use App\Modules\IAM\Core\Domain\Model\Mitra\MitraId;
use App\Modules\IAM\Core\Domain\Model\User\UserId;
use App\Modules\IAM\Core\Domain\Repository\IMitraRepository;
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
        $row = $this->db->table('mitra')->when('id', $id->toString())->where('soft_deleted', false)->first();
        return $row ? $this->buildMitraFromRow($row) : null;
    }

    public function findByUserId(UserId $id): ?Mitra
    {
        $row = $this->db->table('mitra')->when('user_id', $id->toString())->where('soft_deleted', false)->first();
        return $row ? $this->buildMitraFromRow($row) : null;
    }

    private function buildMitraFromRow($row): Mitra
    {
        return new Mitra(
            new MitraId($row->id),
            new UserId($row->user_id),
            new BusinessId($row->business_id),
            new InventoryId($row->inventory_id),
            $row->location,
            $row->soft_deleted
        );
    }

    public function persist(Mitra $mitra): void
    {
        $this->db->table('mitra')->upsert([
            'id' => $mitra->getId()->toString(),
            'user_id' => $mitra->getUserId()->toString(),
            'business_id' => $mitra->getBusinessId()->toString(),
            'inventory_id' => $mitra->getInventoryId()->toString(),
            'location' => $mitra->getLocation(),
            'soft_deleted' => $mitra->isSoftDeleted()
        ], 'id');
    }

    public function softDelete(Mitra $mitra): void
    {
        // TODO: Implement softDelete() method.
    }
}
