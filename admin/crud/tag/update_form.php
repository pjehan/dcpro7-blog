<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../../model/database.php';
require_once __DIR__ . '/../../layout/header.php';

$id = $_GET["id"];
$tag = getTag($id);
?>

<h1>Modifier un tag</h1>

<form action="update_query.php" method="POST">
    <div class="form-group">
        <label for="inputLibelle">Libellé</label>
        <input type="text" name="libelle" class="form-control" id="inputLibelle" value="<?php echo $tag["libelle"]; ?>" placeholder="Libellé">
    </div>
    <input type="hidden" name="id" value="<?php echo $tag["id"]; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>