<?php

// public/index.php
session_start();
require_once '../includes/dbconn.php';
require_once '../controllers/AuthController.php';

$msg = ""; // For storing any error messages

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $authController = new AuthController($con);
    $msg = $authController->login($username, $password);
}

// Include the login form view
include '../views/login.php';
