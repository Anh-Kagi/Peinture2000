<?php
require_once('./services/productService.php');

$paint = productService::getProductById($_GET['id']);
ob_start(); 

?>
<?php $title = $paint->name; ?>

<h1><?php echo $paint->name; ?></h1>
	<ul class="list-group">
	
		<li class ="list-group-item list-group-item-secondary">
				
					<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="container">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="https://media.peinturevoiture.fr/7043-large_default/peinture-urethane-mate.jpg" class="d-block mx-auto" alt="...">
							</div>
							<div class="carousel-item">
								<img src="https://media.castorama.fr/is/image/Castorama/peinture-ext-rieure-multi-supports-colours-noir-mat-2l~3663602170747_36c?$MOB_PREV$&$width=618&$height=618" class="d-block mx-auto" alt="...">
							</div>
							<div class="carousel-item">
								<img src="https://media.peinturevoiture.fr/6010-large_default/peinture-noir-mate-direct.jpg" class="d-block mx-auto" alt="...">
							</div>
						</div>
						</div>
						<button class="carousel-control-prev bg-info" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next bg-info" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					
				</div>
		
		</li>
		<li class ="list-group-item list-group-item-secondary">
			<h1 class="display-6">Description :</h1>
			<?php echo $paint->description; ?>
	
		</li>
		
	
	
	</ul>
	<ul class="list-group list-group-horizontal">
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> Teinte : <?php ?></h4>
		</li>
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> Disponibilité : <?php 
				if($paint->quantity > 0){
					echo $paint->quantity;
				}else{
					echo("Non disponible");
				}
			?> </h4>
		</li>
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> PRIX : <?php echo $paint->price;?></h4>
		</li>
	</ul>


<?php
$content = ob_get_clean();
require_once('./inc/template.php');
?>
