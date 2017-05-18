<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';
require_once __DIR__ . '/../../layout/header.php';

$liste_categories = getAllCategories();
?>

<h1>Ajouter un article</h1>

<form action="insert_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="inputTitre">Titre</label>
        <input type="text" name="titre" class="form-control" id="inputTitre" placeholder="Titre">
    </div>
    <div class="form-group">
        <label for="inputImage">Image</label>
        <input type="file" name="image" class="form-control" id="inputImage">
    </div>
    <div class="form-group">
        <label for="inputContenu">Contenu</label>
        <textarea name="contenu" class="form-control" id="inputContenu"></textarea>
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select name="categorie" class="form-control" id="categorie">
            <?php foreach ($liste_categories as $categorie) : ?>
            <option value="<?php echo $categorie["id"]; ?>">
                <?php echo $categorie["libelle"]; ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>