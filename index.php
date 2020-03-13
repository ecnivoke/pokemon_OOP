<?php 

require 'battle.php';

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>battle</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.4.3/dist/css/foundation-float.min.css" integrity="sha256-TPcVVrzfTETpAWQ8HhBHIMT7+DbszMr5n3eFi+UwIl8= sha384-+aXh7XSzITwlvjelsNWuL1A9rT8pWGaiqMMeUjtKcsWIfzT1oV8Mp3oYxmjPK8Gv sha512-cArttU/Yh+PzfQ/dhCdfBiU9+su+fuCwFxLrlLbvuJE/ynUbstaKweVPs7Hdbok9jlv9cwt+xdk20wRz7oYErQ==" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class='container'>
		
		<?php foreach($pokemons as $pokemon){ ?>
			<div class='row pokediv'>
				<div class='small-12 columns'>
					<h3><?php echo $pokemon->name; ?></h3>
					<?php foreach($pokemon->attacks as $attack) { ?>
						<div id='attack' data-attack="<?php echo $attack['name']; ?>" style="border-color:<?php echo $pokemon->color; ?>;" class='attack'>
							<?php echo $attack['name']; ?>
						</div>
					<?php } // end foreach $pokemon->attacks ?>
				</div>
			</div>
		<?php } // end foreach $pokemons ?>
	</div>
	<?php d($pokemons['charmander']); ?>
	<script type="text/javascript" src='app.js'></script>
</body>
</html>