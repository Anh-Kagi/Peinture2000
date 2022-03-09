<?php $title = 'TITRE DE L\'ONGLET ICI';
ob_start(); ?>

<a href="Liste.php">Liste Client</a>
<a href="ProduitListing.php">Liste Personel</a>

<?php
$content = ob_get_clean();
require_once('./inc/template.php');
