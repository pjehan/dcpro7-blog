<?php

function getAllCommentairesByArticle($id, $commentaire_id = null) {
    global $connection;

    $query = "
        SELECT
            commentaire.id,
            commentaire.contenu,
            commentaire.date_creation,
                DATE_FORMAT(commentaire.date_creation, '%e %M %Y à %H:%i:%s') AS date_creation_format,
                CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
        FROM commentaire
        INNER JOIN utilisateur ON utilisateur.id = commentaire.utilisateur_id
        WHERE commentaire.article_id = :article_id
    ";

    if ($commentaire_id) {
        $query .= " AND commentaire.commentaire_id = :commentaire_id";
    } else {
        $query .= " AND commentaire.commentaire_id IS NULL";
    }

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":article_id", $id);
    if ($commentaire_id) {
        $stmt->bindParam(":commentaire_id", $commentaire_id);
    }
    $stmt->execute();

    return $stmt->fetchAll();
}

function displayArticleCommentaires($id, $commentaire_id = null) {
    $liste_commentaires = getAllCommentairesByArticle($id, $commentaire_id);
    ?><ul><?php
        foreach ($liste_commentaires as $commentaire) {
            ?>
            <li>
                <blockquote>
                    <p><?php echo $commentaire["contenu"]; ?></p>
                    <footer>
                        Commentaire rédigé par
                        <cite><?php echo $commentaire["utilisateur"]; ?></cite>
                        le <?php echo $commentaire["date_creation_format"]; ?>
                    </footer>
                </blockquote>
                <?php displayArticleCommentaires($id, $commentaire["id"]); ?>
            </li>
            <?php
        }
    ?></ul><?php
}