<?php
session_start();

require_once __DIR__ . '/../../vendor/autoload.php';


use Models\Security;
use Models\User;
use Models\Wallet;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input data
    $errors = Security::validateLoginData($email, $password);
    
    if (!empty($errors)) {
        $_SESSION['error'] = implode(', ', $errors);
        header('Location: ../../app/views/auth/login.php');
        exit;
    }

    try {
        $userRepo = new User();
        $user = $userRepo->authenticate($email, $password);

        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['created_at'] = $user['created_at'];
            
            $walletObj = new Wallet;
            $wallet = $walletObj->findByUserID($user['id']);
            $_SESSION['wallet_id'] = $wallet['id'];

            header('Location: ../../app/views/main/dashboard.php');
        } else {
            $_SESSION['error'] = 'Email ou mot de passe incorrect';
            header('Location: ../../app/views/auth/login.php');
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Erreur de connexion';
        header('Location: ../../app/views/auth/login.php');
    }
} else {
    header('Location: ../../app/views/auth/login.php');
}
exit;
?>