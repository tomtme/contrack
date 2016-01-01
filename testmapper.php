<?php
namespace OCA\contrack\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class TestMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'contrack_company', '\OCA\Contrack\Db\Test');
    }

    public function getID($userId) {
        $sql = 'SELECT * FROM *PREFIX*contrack_company WHERE user_id = ?';
        return $this->findEntities($sql, [$userId]);
    }

    public function getAll() {
        $sql = 'SELECT * FROM *PREFIX*contrack_company';
        return $this->findEntities($sql);
    }

}
