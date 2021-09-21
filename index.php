<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Museu Simples</title>
	<script src="https://kit.fontawesome.com/02247dc1eb.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH; ?>style/style.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="utf-8">

</head>
<body>
	<section class="catalogo">
		<form action="" method="post">
			<table width="100%" style="border:none;">
			<tr>
				<td><label>Ordem:&nbsp;</label><input type="text" name="by_ordem"
					value="<?php if(isset($_POST['by_ordem'])) { echo htmlentities ($_POST['by_ordem']); }?>" /></td>
				<td><label>Família:&nbsp;</label><input type="text" name="by_familia" 
					value="<?php if(isset($_POST['by_familia'])) { echo htmlentities ($_POST['by_familia']); }?>"/></td>
				<td><label>Gênero:&nbsp;</label><input type="text" name="by_genero" 
					value="<?php if(isset($_POST['by_genero'])) { echo htmlentities ($_POST['by_genero']); }?>"/></td>
				<td><label>Espécie:&nbsp;</label><input type="text" name="by_especie" 
					value="<?php if(isset($_POST['by_especie'])) { echo htmlentities ($_POST['by_especie']); }?>"/></td>
				<td><input class="button" type="submit" name="submit" value="Buscar" /></td>
			</tr>
			</table>
		</form>

		<div class="container-principal">
			<?php 
				if(isset($_POST['submit'])) {
					include('card.php');
				}
				else {
					$url = isset($_GET['url']) ? $_GET['url'] : 'home';

					if(file_exists($url.'.php')){
						include($url.'.php');
					}
				}		
			?>
		</div>
	</section>
</body>
</html> 