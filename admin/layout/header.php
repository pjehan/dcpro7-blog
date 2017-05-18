<?php require_once __DIR__ . '/../../config/parameters.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Administration</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo $website_root; ?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $website_root; ?>admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo $website_root; ?>admin/vendor/select2/css/select2.min.css" rel="stylesheet">
        <link href="<?php echo $website_root; ?>admin/vendor/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo $website_root; ?>admin/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo $website_root; ?>admin/css/style.css" rel="stylesheet">

    </head>

    <body>

        <?php require_once __DIR__ . '/nav.php'; ?>

        <div class="container-fluid">
            <div class="row">
                <?php require_once __DIR__ . '/sidebar.php'; ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">