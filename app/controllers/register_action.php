<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';

use Models\Security;
use Models\User;
use Models\Wallet;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Validate input data
    $errors = Security::validateRegisterData($name, $email, $password, $confirmPassword);
    
    if (!empty($errors)) {
        $_SESSION['error'] = implode(', ', $errors);
        header('Location: ../../app/views/auth/register.php');
        exit;
    }

    try {
        $userRepo = new User();
        $walletRepo = new wallet();
        
        // Check if email already exists
        if ($userRepo->emailExists($email)) {
            $_SESSION['error'] = 'Cet email est déjà utilisé';
            header('Location: ../../app/views/auth/register.php');
            exit;
        }

        // Create user
        if ($userRepo->createUser($name, $email, $password)) {
            $result = $userRepo->findByEmail($email);
            $walletRepo->createwallet($result['id'] , 0);
            $_SESSION['success'] = 'Compte créé avec succès. Vous pouvez maintenant vous connecter.';
            header('Location: ../../app/views/auth/login.php');
        } else {
            $_SESSION['error'] = 'Erreur lors de la création du compte';
            header('Location: ../../app/views/auth/register.php');
        }
    } catch (Exception $e) {
        $_SESSION['error'] = 'Erreur de base de données';
        header('Location: ../../app/views/auth/register.php');
    }
} else {
    header('Location: ../../app/views/auth/register.php');
}
exit;
?>