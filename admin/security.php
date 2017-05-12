<?php
require_once __DIR__ . '/../model/database.php';

session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION["id"])) {
    // Utilisateur connecté
    $current_user = getUser($_SESSION["id"]);
} else if (isset($_POST["email"]) && isset($_POST["password"])) {
    // Utilisateur provenant du formulaire de login
    $email = $_POST["email"];
    $password = $_POST["password"];
    $current_user = getUserByEmailPassword($email, $password);
    if (isset($current_user["id"])) {
        $_SESSION["id"] = $current_user["id"];
    }
}

if (!isset($current_user["id"])) {
    header("Location: ../login.php");
} else if (!$current_user["admin"]) {
    header("Location: ../index.php");
}