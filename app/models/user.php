<?php 

namespace Models;

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\BaseModel;
use Models\Security;

class User extends BaseModel{
    protected $primaryKey = 'id';
    protected $table = 'users';
    private $id;
    private $name;
    private $email;
    private $createdAt;

    public function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->id;
    }

    public function setname($name) {
        $this->name = $name;
    }
    public function setemail($email) {
        $this->name = $email;
    }
    public function getname() {
        return $this->name;
    }
    public function getemail() {
        return $this->email;
    }

    public function findByEmail($email) {
        $result = $this->where('email', $email);
        return $result;
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