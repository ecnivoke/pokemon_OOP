<?php 

	$error = array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$valid = true;

		// Loop over input
		foreach($_POST as $k => $v){

			if(!empty($v)){
				// Clean input
				$_POST[$k] = test_input($v);
			}
			else {
				// Set error message
				$error[$k] 	= 'required';
				$valid  	= false;
			}
		}

		if($valid){

			insertPokemon($database, $_POST);
			header('Location: ?p=home');
		}
	}


	$types = getTypes($database);

 ?>


<?php include 'header.tpl.php'; ?>

<form method="POST" action="?p=add">


	<div class='row'>
		<div class='small-10 columns small-centered'>

			<div class='row'>
				<div class='small-6 columns'>
					<label for='name'>Pokemon name:</label>
					<input id='name' type="text" name="name">
				</div>
			</div>	

			<div class='row'>
				<div class='small-6 columns'>
					<label for='type'>Pokemon type:</label>
					<select id='type' name='type'>
						<option value="">-Choose a type-</option>
						<?php foreach($types as $type){ ?>
							<option value="<?php echo $type['id']; ?>"><?php echo $type['type']; ?></option>
						<?php } // End foreach $types ?>
					</select>
				</div>
			</div>
			
			<div class='row'>
				<div class='small-6 columns'>
					<label for='hp'>Pokemon hp:</label>
					<input id='hp' type="text" name="hp">
				</div>
			</div>	

			<div class='row'>
				<div class='small-6 columns'>
					<label for='damage'>Pokemon damage:</label>
					<input id='damage' type="text" name="damage">
				</div>
			</div>

			<div class='row'>
				<div class='small-6 columns'>
					<input type="submit" value="Add">
				</div>
			</div>

		</div>
	</div>


</form>

<?php include 'footer.tpl.php'; ?>