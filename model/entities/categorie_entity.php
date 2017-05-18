<?php

function getAllCategories() {
    global $connection;

    $query = "
        SELECT
            categorie.id,
            categorie.libelle,
            COUNT(article.id) AS nb_articles
        FROM categorie
        LEFT JOIN article ON article.categorie_id = categorie.id
        GROUP BY categorie.id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getCategorie($id) {
    global $connection;

    $query = "
        SELECT
            categorie.id,
            categorie.libelle,
            COUNT(article.id) AS nb_articles
        FROM categorie
        LEFT JOIN article ON article.categorie_id = categorie.id
        WHERE categorie.id = :id
        GROUP BY categorie.id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertCategorie($libelle) {
    global $connection;

    $query = "INSERT INTO categorie (libelle) VALUES (:libelle);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->execute();
}

function updateCategorie($id, $libelle) {
    global $connection;

    $query = "UPDATE categorie SET libelle = :libelle WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deleteCategorie($id) {
    global $connection;

    $query = "DELETE FROM categorie WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}