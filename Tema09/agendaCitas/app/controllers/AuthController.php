<?php

namespace app\controllers;


use app\models\UserModel;

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function register($username, $password) {
        return $this->userModel->register($username, $password);
    }

    public function login($username, $password) {
        $user = $this->userModel->login($username, $password);
        if ($user) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        return isset($_SESSION['user_id']);
    }
}