<?php

namespace Controllers;

use Models\Database;

class AuthController {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function showLogin() {
        include '../app/views/auth/login.php';
    }

    public function showRegister() {
        include '../app/views/auth/register.php';
    }

    public function login() {
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email']);
            $password = $_POST['password'];

            if (empty($email) || empty($password)) {
                $_SESSION['error'] = 'Tous les champs sont requis';
                header('Location: /auth/login');
                return;
            }

            $stmt = $this->db->prepare("SELECT id, name, email, password_hash FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                header('Location: /dashboard');
            } else {
                $_SESSION['error'] = 'Email ou mot de passe incorrect';
                header('Location: /auth/login');
            }
        }
    }

    public function register() {
        session_start();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if (empty($name) || empty($email) || empty($password)) {
                $_SESSION['error'] = 'Tous les champs sont requis';
                header('Location: /auth/register');
                return;
            }

            if ($password !== $confirmPassword) {
                $_SESSION['error'] = 'Les mots de passe ne correspondent pas';
                header('Location: /auth/register');
                return;
            }

            if (strlen($password) < 6) {
                $_SESSION['error'] = 'Le mot de passe doit contenir au moins 6 caractères';
                header('Location: /auth/register');
                return;
            }

            // Check if email already exists
            $stmt = $this->db->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $_SESSION['error'] = 'Cet email est déjà utilisé';
                header('Location: /auth/register');
                return;
            }

            // Create user
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
            
            if ($stmt->execute([$name, $email, $passwordHash])) {
                $_SESSION['success'] = 'Compte créé avec succès. Vous pouvez maintenant vous connecter.';
                header('Location: /auth/login');
            } else {
                $_SESSION['error'] = 'Erreur lors de la création du compte';
                header('Location: /auth/register');
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /auth/login');
    }
}