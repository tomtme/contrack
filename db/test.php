<?php
namespace OCA\Contrack\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Test extends Entity implements JsonSerializable {

    // public $id;
    protected $uid;
    protected $name;
    protected $deleted;

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}
