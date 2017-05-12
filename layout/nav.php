<?php
require_once __DIR__ . '/../model/database.php';
$liste_categories = getAllCategories();
?>
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php">Le blog de sport</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="index.php">Accueil</a>
                </li>
                <?php foreach ($liste_categories as $categorie) : ?>
                    <li>
                        <a href="categorie.php?id=<?php echo $categorie["id"]; ?>">
                            <?php echo $categorie["libelle"]; ?>
                            <span class="badge"><?php echo $categorie["nb_articles"]; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>