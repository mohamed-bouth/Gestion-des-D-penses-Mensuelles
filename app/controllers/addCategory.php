<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\Category;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $walletId = $_POST['wallet_id'];
    $categoryName = $_POST['name'];

    $walletObj = new Category();

    $walletObj->createCategory($categoryName , $walletId);

    header("location: ../views/main/category.php");
}