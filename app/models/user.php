<?php 

namespace models;

class user {
    private $id;
    private $name;
    private $email;
    private $createdAt;

    public function __construct($id , $name , $email , $createdAt) {
        $this->$id = $id;
        $this->$name = $name;
        $this->$email = $email;
        $this->$createdAt = $createdAt;
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
}