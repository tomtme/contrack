<?php
namespace OCA\Contrack\Db;

use OCP\IDb;
use OCA\Contrack\Db\librarymapper;

class IncidentMapper extends LibraryMapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'contrack_incident', '\OCA\Contrack\Db\LibraryEntity');
    }
}
