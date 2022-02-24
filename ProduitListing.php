<?php $title = 'Liste des Produits'; ?>
<?php ob_start(); 
require_once('./services/productService.php');
$products = ProductService::getAllProducts();
?>

<h1 class="mt-4"> Liste des Produits </h1>
<table class="table">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom</th>
			<th>id teinte</th>
			<th>prix</th>
			<th>description</th>
			<th>quantité disponible</th>
			<th>Modifier le produit</th>
		</tr>
	</thead>
	
	<tbody>
		
		<?php foreach($products as $product) : ?>
			<tr>
			
				<td><?php echo $product->id; ?> </td>
				<td><?php echo $product->name; ?> </td>
				<td><?php echo $product->shade_id; ?> </td>
				<td><?php echo $product->price; ?> </td>
				<td><?php echo $product->description; ?> </td>
				<td><?php echo $product->quantity; ?> </td>
				<td> <a class="btn btn-primary" href="./pageAjout.php?id=<?php echo $product->id; ?> " role="button">Modifier</a>	
			</tr>
		<?php endforeach; ?>
		
			
	</tbody>					

</table>



<?php
$content = ob_get_clean();
require_once('./inc/template.php');
?>