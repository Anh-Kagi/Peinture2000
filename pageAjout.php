<?php


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
    <input type=text name="nomProduit" id="nomProduit" required="required"><br/>
    <label>Prix Produit</label>
    <input type=number name="prixProduit" id="prixProduit" required="required">
    <br/>
    <label>Description produit</label>
    <input type=text name="DescriptionProduit" id="descriptionProduit">
    <br/>
    <br/>
    <h2> Propriétés du produit</h2>
    <br/>
    <input type="checkbox" id="waterproof" name="waterproof">
    <label for="waterproof">Resistant à l'eau</label></br>
    <input type="checkbox" id="autonetoyante" name="autonetoyante">
    <label for="autonetoyante">auto-nettoyante</label></br>
    <label>Quantité Produit</label>
    <input type=number name="qte" id="qte"><br/>
    <label for="colorPicker">Choisissez la couleur exacte</label>
    <input type="color" id="colorPicker" name="nuance"><br/>
    <label for="nuance">nuance de couleur</label>
    <select name="nuance" id="nuance">
        <option value="">La couleur est une nuance de </option>
        <option value="rouge">Rouge</option>
        <option value="bleu">Bleu</option>
        <option value="vert">Vert</option>
        <option value="jaune">Jaune</option>
        <option value="gris">Gris</option>
    </select></br>
    <button type="submit" class="btn btn-success">Ajouter Produit</button>
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


