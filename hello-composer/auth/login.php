<?php

require '../vendor/autoload.php';
use Uph\Hello\Twig;

$twig = Twig::make(__DIR__ . '/templates');
session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;
if (!$username || !$password) {
    echo $twig->render('login.html.twig');
    die();
}

if ($username !== 'user' || $password !== 'rahasia') {
    echo $twig->render(
        'login.html.twig',
        [
        'username' => $username, 'error' => 'Login salah'
        ]
    );
    die();
}

session_regenerate_id();
$_SESSION['authenticated'] = true;
header('Location: /auth/index.php');

