<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';

use Models\Category;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $categoryId = $_POST['category_id'];

    $walletObj = new Category();

    $walletObj->delete($categoryId);

    header("location: ../views/main/category.php");
}