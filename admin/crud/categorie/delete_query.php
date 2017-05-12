<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';

$error_code = null;
$id = $_POST["id"];

try {
    deleteCategorie($id);
} catch (PDOException $exc) {
    $error_code = $exc->getCode();
}

header("Location: index.php?error_code=" . $error_code);