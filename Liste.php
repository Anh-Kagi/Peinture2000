<?php $title = "Liste de Peinture";
ob_start(); ?>
<h1 class="text-center"> Liste des peintures disponibles </h1>

<ul class="list-group list-group-horizontal-sm">
	<a href="./desc.php?id=2" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h1 class="text-center"> Peinture noir mat </h1>
			<big>
				<ul>
					<li> 25€</li>
					<li> 45 disponibles</li>
					<li> Teinte noir </li>
			</big>
		</div>
		<p> Qu'elle est belle </p>
		<img src="https://media.peinturevoiture.fr/7043-large_default/peinture-urethane-mate.jpg"
			style="max-width:30%;">
	</a>
	<a href="./desc.php?id=2" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h1 class"text-center"> Peinture blanche </h1>
			<big>
				<ul>
					<li> 20€</li>
					<li> 10 disponibles</li>
					<li> Teinte blanche </li>
			</big>
		</div>
		<p> De la peinture blanche ! </p>
		<img src="https://media.castorama.fr/is/image/Castorama/peinture-dulux-valentine-murs-et-plafonds-blanc-mat-2-5l~3031520195119_02c"
			style="max-width:30%;">
	</a>
</ul>
<?php
$content = ob_get_clean();
require_once("./inc/template.php");
