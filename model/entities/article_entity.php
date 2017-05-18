<?php

function getAllArticles() {
    global $connection;

    $query = "
        SELECT
            article.id,
            article.titre,
            article.image,
            article.date_creation,
            DATE_FORMAT(article.date_creation, '%e %M %Y à %H:%i') AS date_creation_format,
            CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
        FROM article
        INNER JOIN categorie ON categorie.id = article.categorie_id
        INNER JOIN utilisateur ON utilisateur.id = article.utilisateur_id
        ORDER BY article.date_creation DESC;
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getLastArticles() {
    global $connection;

    $query = "
        SELECT
            article.id,
            article.titre,
            article.image,
            article.date_creation,
            DATE_FORMAT(article.date_creation, '%e %M %Y à %H:%i') AS date_creation_format,
            CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
        FROM article
        INNER JOIN categorie ON categorie.id = article.categorie_id
        INNER JOIN utilisateur ON utilisateur.id = article.utilisateur_id
        ORDER BY article.date_creation DESC
        LIMIT 3;
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllArticlesByCategorie($id) {
    global $connection;

    $query = "
        SELECT
            article.id,
            article.titre,
            article.image,
            article.date_creation,
            DATE_FORMAT(article.date_creation, '%e %M %Y à %H:%i') AS date_creation_format,
            CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
        FROM article
        INNER JOIN categorie ON categorie.id = article.categorie_id
        INNER JOIN utilisateur ON utilisateur.id = article.utilisateur_id
        WHERE categorie.id = :id
        ORDER BY article.date_creation DESC;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getArticle($identifiant) {
    global $connection;

    $query = "
        SELECT
            article.id,
            article.titre,
            article.image,
            article.contenu,
            article.date_creation,
            DATE_FORMAT(article.date_creation, '%e %M %Y à %H:%i') AS date_creation_format,
            CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur,
            article.categorie_id,
            categorie.libelle AS categorie
        FROM article
        INNER JOIN categorie ON categorie.id = article.categorie_id
        INNER JOIN utilisateur ON utilisateur.id = article.utilisateur_id
        WHERE article.id = :article_id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":article_id", $identifiant);
    $stmt->execute();

    return $stmt->fetch();
}

function insertArticle($titre, $image, $contenu, $utilisateur_id, $categorie_id) {
    global $connection;

    $query = "INSERT INTO article (titre, image, contenu, date_creation, utilisateur_id, categorie_id) VALUES (:titre, :image, :contenu, NOW(), :utilisateur_id, :categorie_id);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":titre", $titre);
    $stmt->bindParam(":image", $image);
    $stmt->bindParam(":contenu", $contenu);
    $stmt->bindParam(":utilisateur_id", $utilisateur_id);
    $stmt->bindParam(":categorie_id", $categorie_id);
    $stmt->execute();
}

function updateArticle($id, $libelle) {
    global $connection;

    $query = "UPDATE categorie SET libelle = :libelle WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deleteArticle($id) {
    global $connection;

    $query = "DELETE FROM article WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}