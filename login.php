<?php
$header["title"] = "Le blog de sport";
$header["subtitle"] = "Login";
$header["img"] = "home-bg.jpg";
require_once 'layout/header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <form class="form-horizontal" action="admin/" method="POST">
                <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Se sourvenir de moi
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Se connecter</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<?php require_once 'layout/footer.php'; ?>