<?php

namespace Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\BaseModel;
use Models\Security;

class Category extends BaseModel{
    protected $primaryKey = 'id';
    protected $table = 'categories';
    protected $id;
    protected $name;

    public function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

        public function createCategory($name , $walletId) {
        $data = [
            'name' => Security::sanitizeInput($name),
            'wallet_id' => Security::sanitizeInput($walletId)
        ];
        
        return $this->create($data);

        
    }

}