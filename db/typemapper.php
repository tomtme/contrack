<?php
namespace OCA\Contrack\Db;

use OCP\IDb;
use OCA\Contrack\Db\librarymapper;

class TypeMapper extends LibraryMapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'contrack_type', '\OCA\Contrack\Db\LibraryEntity');
    }
}
