<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';

$libelle = $_POST["libelle"];

insertTag($libelle);

header("Location: index.php");