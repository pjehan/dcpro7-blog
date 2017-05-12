<?php
require_once 'model/database.php';

$id = $_GET["id"];
$article = getArticle($id);
$liste_tags = getAllTagsByArticle($id);

$header["title"] = $article["titre"];
$header["subtitle"] = "";
$header["img"] = $article["image"];
require_once 'layout/header.php';
?>

<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div>
                    <span class="label label-info">
                        <i class="fa fa-calendar"></i>
                        <?php echo $article["date_creation_format"]; ?>
                    </span>
                    <span class="label label-primary">
                        <i class="fa fa-user"></i>
                        <?php echo $article["utilisateur"]; ?>
                    </span>
                    <a href="categorie.php?id=<?php echo $article["categorie_id"] ?>">
                        <span class="label label-success">
                            <i class="fa fa-tag"></i>
                            <?php echo $article["categorie"]; ?>
                        </span>
                    </a>
                    <?php foreach ($liste_tags as $tag) : ?>
                        <span class="label label-warning">
                            <i class="fa fa-tags"></i>
                            <?php echo $tag["libelle"]; ?>
                        </span>
                    <?php endforeach; ?>
                </div>
                <?php echo $article["contenu"]; ?>

                <section class="commentaires">
                    <?php displayArticleCommentaires($id); ?>
                </section>

            </div>
        </div>
    </div>
</article>

<hr>

<?php require_once 'layout/footer.php'; ?>