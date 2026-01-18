<?php

namespace Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\BaseModel;
use Models\Security;

class Wallet extends BaseModel{
    protected $primaryKey = 'users_id';
    protected $table = 'wallets';
    private $userId;
    private $budget;

    public function __construct() {
        parent::__construct();
    }

    public function setBudget($budget) {
        $this->budget = $budget;
    }

    public function getBudget() {
        return $this->budget;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function createwallet($userId , $budget) {
        $data = [
            'users_id' => Security::sanitizeInput($userId),
            'budget' => Security::sanitizeInput($budget),
        ];
        
        return $this->create($data);
    }

    public function findByUserID($id) {
        $result = $this->where('users_id', $id);
        return $result;
    }

    public function editwallet($userId , $budget) {
        $data = [
            'budget' => Security::sanitizeInput($budget),
        ];
        
        return $this->update($userId , $data);
    }

}

