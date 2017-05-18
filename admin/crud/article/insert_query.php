<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';

$image = $_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../../../img/" . $image);

$titre = $_POST["titre"];
$contenu = $_POST["contenu"];
$categorie = $_POST["categorie"];

insertArticle($titre, $image, $contenu, $current_user["id"], $categorie);

header("Location: index.php");