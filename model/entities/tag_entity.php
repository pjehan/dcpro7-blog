<?php

function getAllTagsByArticle($id) {
    global $connection;

    $query = "
        SELECT
            tag.id,
            tag.libelle
        FROM tag
        INNER JOIN article_has_tag ON article_has_tag.tag_id = tag.id
        WHERE article_has_tag.article_id = :article_id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":article_id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllTags() {
    global $connection;

    $query = "
        SELECT
            tag.id,
            tag.libelle,
            COUNT(article_has_tag.article_id) AS nb_articles
        FROM tag
        LEFT JOIN article_has_tag ON article_has_tag.tag_id = tag.id
        GROUP BY tag.id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getTag($id) {
    global $connection;

    $query = "
        SELECT
            tag.id,
            tag.libelle,
            COUNT(article_has_tag.article_id) AS nb_articles
        FROM tag
        LEFT JOIN article_has_tag ON article_has_tag.tag_id = tag.id
        WHERE tag.id = :id
        GROUP BY tag.id;
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetch();
}

function insertTag($libelle) {
    global $connection;

    $query = "INSERT INTO tag (libelle) VALUES (:libelle);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->execute();
}

function updateTag($id, $libelle) {
    global $connection;

    $query = "UPDATE tag SET libelle = :libelle WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":libelle", $libelle);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deleteTag($id) {
    global $connection;

    $query = "DELETE FROM tag WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}