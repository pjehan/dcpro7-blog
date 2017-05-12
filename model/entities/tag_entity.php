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