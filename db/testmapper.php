<?php
namespace OCA\Contrack\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class TestMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'contrack_company', '\OCA\Contrack\Db\Test');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*contrack_company WHERE id = ? AND uid = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM *PREFIX*contrack_company WHERE uid = ?';
        return $this->findEntities($sql, [$userId]);
    }

}
