<?php

namespace App\Modules\Shared\Model;

use App\Modules\Shared\Handler\EventHandler;
use Illuminate\Database\ConnectionInterface;

class uow
{
    private ConnectionInterface $db;

    /**
     * @param ConnectionInterface $db
     */
    public function __construct(ConnectionInterface $db)
    {
        $this->db = $db;
    }

    public static function instance(ConnectionInterface $connection): self
    {
        return new self($connection);
    }

    public function begin(): void
    {
        EventHandler::hold();
        $this->db->beginTransaction();
    }

    public function commit(): void
    {
        $this->db->commit();
        EventHandler::release();
    }

    public function rollback(): void
    {
        $this->db->rollBack();
        EventHandler::reset();
        EventHandler::release();
    }
}
