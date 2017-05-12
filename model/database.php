<?php
require_once __DIR__ . "/../config/parameters.php";

$connection = new PDO("mysql:dbname=" . $db["name"] . ";host=" . $db["host"], $db["user"], $db["pass"]);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$connection->exec("SET names utf8");
$connection->exec("SET lc_time_names = 'fr_FR'");

$files = scandir(__DIR__ . "/entities");
foreach ($files as $file) {
    $ext = pathinfo(__DIR__ . "/entities/" . $file, PATHINFO_EXTENSION);
    if (!is_dir($file) && $ext == "php") {
        require_once __DIR__ . "/entities/" . $file;
    }
}
