<?php

function getUser($id) {
    global $connection;

    $query = "
        SELECT
            utilisateur.id,
            utilisateur.nom,
            utilisateur.prenom,
            utilisateur.email,
            utilisateur.admin
        FROM utilisateur
        WHERE utilisateur.id = :id
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    return $stmt->fetch();
}

function getUserByEmailPassword($email, $password) {
    global $connection;

    $query = "
        SELECT
            utilisateur.id,
            utilisateur.nom,
            utilisateur.prenom,
            utilisateur.email,
            utilisateur.admin
        FROM utilisateur
        WHERE utilisateur.email = :email
        AND utilisateur.mdp = MD5(:password)
    ";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    return $stmt->fetch();
}
