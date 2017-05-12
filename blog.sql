USE dcpro7_blog;

-- Rechercher la liste des catégories
SELECT
	categorie.id,
    categorie.libelle
FROM categorie;

-- Rechercher la liste des tags liés à un article
SELECT
	tag.id,
    tag.libelle
FROM tag
INNER JOIN article_has_tag ON article_has_tag.tag_id = tag.id
WHERE article_has_tag.article_id = 1;

-- Rechercher les informations d'un article
SELECT *
FROM article
WHERE article.id = 1;

-- Rechercher la liste des 3 derniers articles postés
SELECT
	article.titre,
    article.image,
    article.date_creation,
    DATE_FORMAT(article.date_creation, '%e %M %Y à %h:%i') AS date_creation_format,
    CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
FROM article
INNER JOIN categorie ON categorie.id = article.categorie_id
INNER JOIN utilisateur ON utilisateur.id = article.utilisateur_id
ORDER BY article.date_creation DESC
LIMIT 3;

-- Rechercher le nombre total d'articles
SELECT COUNT(*) AS nb_articles
FROM article;

-- Rechercher le nombre total d'articles par catégorie
SELECT
	categorie.id,
    categorie.libelle,
    COUNT(article.id) AS nb_articles
FROM categorie
LEFT JOIN article ON article.categorie_id = categorie.id
GROUP BY categorie.id;

-- Rechercher le nom et le prénom de l’utilisateur ayant posté le plus de messages
SELECT
	utilisateur.nom,
    utilisateur.prenom,
    COUNT(commentaire.id) AS nb_commentaires
FROM utilisateur
INNER JOIN commentaire ON commentaire.utilisateur_id = utilisateur.id
GROUP BY utilisateur.id
ORDER BY nb_commentaires DESC
LIMIT 1
;


-- Rechercher le nombre moyen de messages postés par utilisateur
SELECT AVG(t0.nb_commentaires)
FROM (
	SELECT
		commentaire.utilisateur_id,
		COUNT(*) AS nb_commentaires
	FROM commentaire
	GROUP BY commentaire.utilisateur_id
) AS t0;


SELECT
	commentaire.id,
    commentaire.contenu,
    commentaire.date_creation,
	DATE_FORMAT(commentaire.date_creation, '%e %M %Y à %H:%i:%s') AS date_creation_format,
	CONCAT(utilisateur.prenom, ' ', utilisateur.nom) AS utilisateur
FROM commentaire
INNER JOIN utilisateur ON utilisateur.id = commentaire.utilisateur_id
WHERE commentaire.article_id = 2
AND commentaire.commentaire_id IS NULL;
