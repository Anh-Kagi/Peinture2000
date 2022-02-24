<?php $title = 'TITRE DE L\'ONGLET ICI'; ?>
<?php ob_start(); ?>

    <a href="Liste.html">Liste Client</a>
    <a href="ProduitListing.php">Liste Personel</a>

<?php
$content = ob_get_clean();
require_once('./inc/template.php');
?>
