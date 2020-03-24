<?php include 'header.tpl.php'; ?>

<?php 

	if(!isset($_SESSION['pokemons'])){
		$pokemons = array();
		// Loop over players
		foreach($_POST as $player => $pokemon){
			// Get pokemon data
			$pokemons[$player] = getPokemon($database, $pokemon);
		}

		foreach($pokemons as $player => $data){

			$_SESSION['pokemons'][$player] = createPokemon($data);
		}

		$_SESSION['turn'] 			= 'player_1'; // Set turn to player 1
		$_SESSION['attack_log'] 	= array();
	}

 ?>

<div class='row'>
	<div class='small-6 columns small-centered'>
		Turn: <?php echo $_SESSION['turn']; ?>
		<?php foreach($_SESSION['pokemons'] as $k => $pokemon){ ?>
			<div class='row'>
				<div class='small-12 columns battle-div'>
					<div class='row'>
						<div class='small-12 columns title' style="color:<?php echo $pokemon->getColor(); ?>">
							<?php echo $pokemon->getName(); ?>
						</div>
						<div class='small-12 columns health'>
							<?php echo $pokemon->getHealth().' / '.$pokemon->getHp(); ?>
						</div>
					</div>
					<?php if($_SESSION['turn'] == $k){ ?>
						<div class='row'>
							<?php foreach($pokemon->getAttacks() as $attack){ ?>
								<div class='small-5 columns end attacks'>
									<a href="modules/action.php?atk=<?php echo $attack['name']; ?>">
										<div class='name'>
											<?php echo $attack['name']; ?>
										</div>
									</a>
								</div>
							<?php } // End foreach $pokemon->attacks ?>
						</div>
					<?php } // End if $_SESSION['turn'] ?>
				</div>
			</div>
		<?php } // End foreach $_SESSION['pokemons'] ?>
		
		<?php foreach(array_reverse($_SESSION['attack_log']) as $msg){ ?>
			<?php echo $msg."<hr />"; ?>
		<?php } // End foreach $_SESSION['attack_log'] ?>
	</div>
</div>

<?php include 'footer.tpl.php'; ?>