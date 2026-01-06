<?php

namespace models;

abstract class transaction {
    protected $userID;
    protected $date;
    protected $montant;

    public function __construct($userID, $date, $montant) {
        $this->userID = $userID;
        $this->date = $date;
        $this->montant = $montant;
    }

    public function getUserID() {
        return $this->userID;
    }

    public function getDate() {
        return $this->date;
    }

    public function getMontant() {
        return $this->montant;
    }

    public function setdate($date) {
        $this->date = $date;
    }

    public function setMontant($montant) {
        $this->montant = $montant;
    }

}