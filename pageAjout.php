<?php
require_once  "services/productService.php";
require_once "models/product.php";
require_once  "services/shadeService.php";
require_once "models/shade.php";
if(!isset($title)){
    $title = "Peinture2000";
}
ob_start();
$nom = "ajouter";
$productName="";
$productDesc="";
$productQte="";
$productPrix=0;
$shades= ShadeService::getAllShades();


if(!isset ($_GET['id'])){

}
else{
    $nom="modifier";
    $currentProduit= ProductService::getProduitById($_GET['id']);
    $productName=$currentProduit->name;
    $productDesc=$currentProduit->description;
    $productQte=$currentProduit->quantity;
    $productPrix=$currentProduit->price;
    $produitNuance =$currentProduit->shade_id;
}

?>
<html>
<head>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1 class="text-center">Page d'ajout produit</h1>
<title >Ajouter un produit </title>
<form class="text-center border" >
    <label>Nom Produit</label>
    <input type=text name="nomProduit" id="nomProduit" value="<?php echo $productName ?>" required="required"><br/>
    <label>Prix Produit</label>
    <input type=number name="prixProduit" id="prixProduit" value="<?php echo $productPrix ?>"  required="required">
    <br/>
    <label>Description produit</label>
    <input type=text name="DescriptionProduit" id="descriptionProduit" value="<?php echo $productDesc ?>" >
    <br/>
    <br/>
    <h2> Propriétés du produit</h2>
    <br/>
    <input type="checkbox" id="waterproof" name="waterproof">
    <label for="waterproof">Resistant à l'eau</label></br>
    <input type="checkbox" id="autonetoyante" name="autonetoyante">
    <label for="autonetoyante">auto-nettoyante</label></br>
    <label>Quantité Produit</label>
    <input type=number name="qte" id="qte" value="<?php echo $productQte ?>" ><br/>
    <label for="colorPicker">Choisissez la couleur exacte</label>
    <input type="color" id="colorPicker" name="nuance"><br/>
    <label for="nuance">nuance de couleur</label>
    <select name="nuance" id="nuance">
        <option value="">La couleur est une nuance de </option>
        <?php
        foreach ($shades as $shade)
        {
            echo "<option value = \" ".$shade->name." \" id=\" ".$shade->id."\"> ".$shade->name."</option>";
        }

        ?>
    </select></br>
    <button type="submit" class="btn btn-success">Ajouter/Modifier Produit</button>
</form>
</body>
<style>
    form{
        width: 40%;
        margin: auto;
        margin-top: 200px;
    }
</style>
</html>
<?php
$content = ob_get_clean();
require_once('./inc/template.php');
?>


