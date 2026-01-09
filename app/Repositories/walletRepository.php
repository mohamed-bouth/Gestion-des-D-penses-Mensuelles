<?php

namespace Repositories;
require_once __DIR__ . '/../../vendor/autoload.php';

use Repositories\BaseModel;
use Models\Security;

class walletRepository extends BaseModel {
    protected $table = 'wallets';

    public function createwallet($userId , $budget) {
        $data = [
            'user_id' => Security::sanitizeInput($userId),
            'email' => Security::sanitizeInput($budget),
        ];
        
        return $this->create($data);
    }

}