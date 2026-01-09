<?php

namespace Models;

class Security {
    
    public static function validateEmail($email) {
        return filter_var(trim($email), FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword($password) {
        return strlen($password) >= 6;
    }

    public static function validateName($name) {
        return !empty(trim($name)) && strlen(trim($name)) >= 2;
    }

    public static function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    public static function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }

    public static function validateLoginData($email, $password) {
        $errors = [];
        
        if (empty($email) || empty($password)) {
            $errors[] = 'Tous les champs sont requis';
        }
        
        if (!empty($email) && !self::validateEmail($email)) {
            $errors[] = 'Email invalide';
        }
        
        return $errors;
    }

    public static function validateRegisterData($name, $email, $password, $confirmPassword) {
        $errors = [];
        
        if (empty($name) || empty($email) || empty($password)) {
            $errors[] = 'Tous les champs sont requis';
        }
        
        if (!empty($name) && !self::validateName($name)) {
            $errors[] = 'Le nom doit contenir au moins 2 caractères';
        }
        
        if (!empty($email) && !self::validateEmail($email)) {
            $errors[] = 'Email invalide';
        }
        
        if (!empty($password) && !self::validatePassword($password)) {
            $errors[] = 'Le mot de passe doit contenir au moins 6 caractères';
        }
        
        if ($password !== $confirmPassword) {
            $errors[] = 'Les mots de passe ne correspondent pas';
        }
        
        return $errors;
    }
}