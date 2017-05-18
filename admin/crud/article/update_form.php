<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';
require_once __DIR__ . '/../../layout/header.php';

$id = $_GET["id"];
$categorie = getCategorie($id);
?>

<h1>Modifier une catégorie</h1>

<form action="update_query.php" method="POST">
    <div class="form-group">
        <label for="inputLibelle">Libellé</label>
        <input type="text" name="libelle" class="form-control" id="inputLibelle" value="<?php echo $categorie["libelle"]; ?>" placeholder="Libellé">
    </div>
    <input type="hidden" name="id" value="<?php echo $categorie["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>