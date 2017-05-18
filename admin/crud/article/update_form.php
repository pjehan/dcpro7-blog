<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';
require_once __DIR__ . '/../../layout/header.php';

$id = $_GET["id"];
$article = getArticle($id);
$liste_categories = getAllCategories();
?>

<h1>Modifier un article</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputTitre">Titre</label>
        <input type="text" name="titre" value="<?php echo $article["titre"]; ?>" class="form-control" id="inputTitre" placeholder="Titre">
    </div>
    <div class="form-group">
        <label for="inputImage">Image</label>
        <input type="file" name="image" class="form-control" id="inputImage">
        <img src="<?php echo $website_root ?>img/<?php echo $article["image"]; ?>" class="img-thumbnail">
    </div>
    <div class="form-group">
        <label for="inputContenu">Contenu</label>
        <textarea name="contenu" class="form-control" id="inputContenu"><?php echo $article["contenu"]; ?></textarea>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select name="categorie" class="form-control" id="categorie">
            <?php foreach ($liste_categories as $categorie) : ?>
            <option value="<?php echo $categorie["id"]; ?>" <?php if ($categorie["id"] == $article["categorie_id"]) : ?>selected<?php endif; ?>>
                <?php echo $categorie["libelle"]; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="id" value="<?php echo $article["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>