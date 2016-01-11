<?php
namespace OCA\Contrack\Db;

use OCP\IDb;
use OCA\Contrack\Db\librarymapper;

class CompanyMapper extends LibraryMapper {

    public function __construct(IDb $db) {
        parent::__construct($db, 'contrack_company', '\OCA\Contrack\Db\LibraryEntity');
    }
}
