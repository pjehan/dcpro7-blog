<?php
require_once __DIR__ . '/../../security.php';
require_once __DIR__ . '/../../layout/header.php';
?>

<h1>Ajouter un tag</h1>

<form action="insert_query.php" method="POST">
    <div class="form-group">
        <label for="inputLibelle">Libellé</label>
        <input type="text" name="libelle" class="form-control" id="inputLibelle" placeholder="Libellé">
    </div>
    <button type="submit" class="btn btn-success">
        <i class="fa fa-save"></i>
        Enregistrer
    </button>
</form>

<?php require_once __DIR__ . '/../../layout/footer.php'; ?>