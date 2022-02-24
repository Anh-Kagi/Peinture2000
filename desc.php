<!DOCTYPE html>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<head>
<?php

// $paint = mysql_query("SELECT * FROM paint WHERE ")

?>


<body>
	<ul class="list-group"><h1 class="display-3"> <?php echo("Peinture Noir Mat")?></h1>
	
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
			<?php echo("Une peinture d'un noir profond et mat. Idéal en tant que base pour un support plus coloré.")?>
	
		</li>
		
	
	
	</ul>
	<ul class="list-group list-group-horizontal">
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> Teinte : <?php echo("Noir") ?></h4>
		</li>
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> Disponibilité : <?php echo("46 exemplaires") ?> </h4>
		</li>
		<li class ="list-group-item flex-fill list-group-item-secondary">
			<h4> PRIX : 25€</h4>
		</li>
	</ul>




</body>
</head>
</html>