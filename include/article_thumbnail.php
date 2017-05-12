<div class="post-preview">
    <a href="article.php?id=<?php echo $article["id"]; ?>">
        <h2 class="post-title">
            <?php echo $article["titre"]; ?>
        </h2>
    </a>
    <p class="post-meta">Publié par <a href="#"><?php echo $article["utilisateur"] ?></a> le <?php echo $article["date_creation_format"]; ?></p>
</div>