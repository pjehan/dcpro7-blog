<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';

$id = $_POST["id"];
$titre = $_POST["titre"];
$contenu = $_POST["contenu"];
$categorie = $_POST["categorie"];

if ($_FILES["image"]["name"] != "") {
    // Upload de la nouvelle image
    $image = $_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], __DIR__ . "/../../../img/" . $image);
} else {
    // Le nom de l'image ne change pas
    $article = getArticle($id);
    $image = $article["image"];
}


updateArticle($id, $titre, $image, $contenu, $categorie);

header("Location: index.php");