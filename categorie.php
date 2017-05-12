<?php
require_once 'model/database.php';

$id = $_GET["id"];
$categorie = getCategorie($id);
$liste_articles = getAllArticlesByCategorie($id);

$header["title"] = $categorie["libelle"];
$header["subtitle"] = "";
$header["img"] = "home-bg.jpg";
require_once 'layout/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <?php if (count($liste_articles) == 0) : ?>

                <p>Aucun article dans cette catégorie !</p>

            <?php else : ?>

                <?php foreach ($liste_articles as $article) : ?>
                    <?php include 'include/article_thumbnail.php'; ?>
                    <hr>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>