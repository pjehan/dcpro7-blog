<?php
require_once 'model/database.php';

$liste_articles = getLastArticles();

/*
  echo "<pre>";
  print_r($liste_articles);
  echo "</pre>";
  die;
 */

$header["title"] = "Le blog de sport";
$header["subtitle"] = "Découvrez l'actualité du sport";
$header["img"] = "home-bg.jpg";
require_once 'layout/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <?php foreach ($liste_articles as $article) : ?>
                <?php include 'include/article_thumbnail.php'; ?>
                <hr>
            <?php endforeach; ?>

            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">Older Posts &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<hr>

<?php require_once 'layout/footer.php'; ?>