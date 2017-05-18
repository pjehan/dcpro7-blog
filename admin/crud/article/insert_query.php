<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';

$titre = $_POST["titre"];
$contenu = $_POST["contenu"];
$categorie = $_POST["categorie"];

insertArticle($titre, null, $contenu, $current_user["id"], $categorie);

header("Location: index.php");