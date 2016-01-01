<?php
namespace OCA\OwnNotes\Db;

use JsonSerializable;

use OCP\AppFramework\Db\Entity;

class Test extends Entity implements JsonSerializable {

    protected $id;
    protected $uid;
    protected $name;

    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'name' => $this->name
        ];
    }
}
