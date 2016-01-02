<?php
namespace OCA\OwnNotes\Service;

use Exception;

use OCP\AppFramework\Db\DoesNotExistException;
use OCP\AppFramework\Db\MultipleObjectsReturnedException;

use OCA\Contrack\Db\Test;
use OCA\Contrack\Db\TestMapper;


class TestService {

    private $mapper;

    public function __construct(TestMapper $mapper){
        $this->mapper = $mapper;
    }

    public function findAll($userId) {
        return $this->mapper->findAll($userId);
    }

    private function handleException ($e) {
        if ($e instanceof DoesNotExistException ||
            $e instanceof MultipleObjectsReturnedException) {
            throw new NotFoundException($e->getMessage());
        } else {
            throw $e;
        }
    }

    public function find($id, $userId) {
        try {
            return $this->mapper->find($id, $userId);

        // in order to be able to plug in different storage backends like files
        // for instance it is a good idea to turn storage related exceptions
        // into service related exceptions so controllers and service users
        // have to deal with only one type of exception
        } catch(Exception $e) {
            $this->handleException($e);
        }
    }

    public function create($title, $content, $userId) {
        $test = new Test();
        $test->setTitle($title);
        $test->setContent($content);
        $test->setUserId($userId);
        return $this->mapper->insert($note);
    }

    public function update($id, $title, $content, $userId) {
        try {
            $test = $this->mapper->find($id, $userId);
            $test->setTitle($title);
            $test->setContent($content);
            return $this->mapper->update($note);
        } catch(Exception $e) {
            $this->handleException($e);
        }
    }

    // public function delete($id, $userId) {
    //     try {
    //         $test = $this->mapper->find($id, $userId);
    //         $this->mapper->delete();
    //         return $note;
    //     } catch(Exception $e) {
    //         $this->handleException($e);
    //     }
    // }

}
