<?php
// controllers/AuthController.php
require_once '../models/User.php';

class AuthController {
    private $userModel;

    public function __construct($dbconn) {
        $this->userModel = new User($dbconn);
    }

    public function login($username, $password) {
        $user = $this->userModel->validateUser($username, $password);

        if ($user) {
            if (password_verify($password, $user['Password'])) {
                session_start();
                $_SESSION['user_id'] = $user['ID'];
                header('location: dashboard.php');
                exit();
            } else {
                return "Login Failed: Invalid Password!";
            }
        } else {
            return "No user found with that username!";
        }
    }
}
