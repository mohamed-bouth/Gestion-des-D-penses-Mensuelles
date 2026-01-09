<?php

namespace Repositories;
require_once __DIR__ . '/../../vendor/autoload.php';

use Repositories\BaseModel;
use Models\Security;

class UserRepository extends BaseModel {
    protected $table = 'users';

    public function findByEmail($email) {
        $result = $this->where('email', $email);
        return !empty($result) ? $result[0] : false;
    }

    public function emailExists($email) {
        $result = $this->where('email', $email);
        return !empty($result);
    }

    public function createUser($name, $email, $password) {
        $data = [
            'name' => Security::sanitizeInput($name),
            'email' => Security::sanitizeInput($email),
            'password_hash' => Security::hashPassword($password)
        ];
        
        return $this->create($data);
    }

    public function authenticate($email, $password) {
        $user = $this->findByEmail($email);
        
        if ($user && Security::verifyPassword($password, $user['password_hash'])) {
            return [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'created_at' => $user['created_at']
            ];
        }
        
        return false;
    }
}