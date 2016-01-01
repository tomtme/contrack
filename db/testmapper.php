<?php
namespace OCA\contrack\Db;

use OCP\IDb;
use OCP\AppFramework\Db\Mapper;

class TestMapper extends Mapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'Contrack_Company', '\OCA\Contrack\Db\Test');
    }

    public function find($id, $userId) {
        $sql = 'SELECT * FROM *PREFIX*Contrack_Company WHERE id = ? AND user_id = ?';
        return $this->findEntity($sql, [$id, $userId]);
    }

    public function findAll() {
        $sql = 'SELECT * FROM *PREFIX*Contrack_Company';
        return $this->findEntities($sql);
    }

}
