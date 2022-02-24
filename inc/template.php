<?php
require_once('./utils/session.php');
if(!isset($title)){
	$title = "Peinture2000";
}
ob_clean(); ?>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf8">
		<title><?php echo $title; ?></title>
        <link rel="stylesheet" href="./css/bootstrap.min.css" >
	</head>
	
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="./">Peinture2000</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

<?php if(isset($_SESSION['LOGGED']) && $_SESSION['LOGGED']){
	?>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./account.php">Mon compte</a>
					</li>
			</div>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./logout.php">Déconnexion</a>
					</li>
			</div>
	<?php
}else{
	?>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="./login.php">Se connecter</a>
					</li>
			</div>
	<?php
}
?>
		</nav>
		
		<div class="content">
		<?php
			if(isset($content)){
				echo $content;
			}
		?>
		</div>
	</body>
</html>
