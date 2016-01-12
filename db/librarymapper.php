<?php
namespace OCA\Contrack\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class LibraryMapper extends Mapper {
    public function __construct(IDb $db, $tableName, $entityClass) {
        parent::__construct($db, $tableName, $entityClass);
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE deleted = 0 AND id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll($userId) {
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE deleted = 0 AND uid = ? ';
        return $this->findEntities($sql, [$userId]);
    }


}
