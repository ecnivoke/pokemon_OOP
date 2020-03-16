<?php 
	$pokemons = getPokemons($database);
 ?>

<?php include 'header.tpl.php'; ?>

<?php foreach($pokemons as $pokemon){ ?>
	<a href="index.php?p=battle&poke=<?php echo $pokemon['id']; ?>">
		<div class='row'>
			<div class='small-10 medium-6 columns small-centered pokemon-holder'>
				<h4><?php echo $pokemon['name']; ?></h4>
				<?php echo $pokemon['type']; ?>
			</div>
		</div>
	</a>
<?php } // End $pokemons foreach ?>

<?php include 'footer.tpl.php'; ?>