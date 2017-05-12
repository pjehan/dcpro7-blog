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