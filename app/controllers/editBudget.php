<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\Wallet;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $userId = $_POST['userId'];
    $budget = $_POST['budget'];

    $walletModels = new Wallet;
    $walletModels->editwallet($userId , $budget);

    header("location: ../views/main/profile.php");
}

