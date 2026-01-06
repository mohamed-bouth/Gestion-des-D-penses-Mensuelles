<?php

class wallet {
    private $userId;
    private $budget;

    public function __construct($userId, $budget) {
        $this->userId = $userId;
        $this->budget = $budget;
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

}

