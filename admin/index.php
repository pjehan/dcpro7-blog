<?php
require_once __DIR__ . '/security.php';
require_once __DIR__ . '/layout/header.php';

echo "Bonjour " . $current_user["prenom"];
?>

<a href="../logout.php">Déconnexion</a>

<?php require_once __DIR__ . '/layout/footer.php'; ?>