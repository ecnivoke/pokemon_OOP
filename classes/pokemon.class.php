<?php 

// print rules
// names: 	<span style=\'color:blue;\'></span>
// damage: 	<span style=\'color:red;\'></span>
// health: 	<span style=\'color:#17bd54;\'></span>
// attacks:<span style=\'color:#bf62b1;\'></span>

class Pokemon {

	// Properties
	public $name;
	public $damage;
	public $hp;
	public $health;
	public $type;
	public $color;
	public $attacks;

	// Methodes
	public function __construct($pokemon){

		$this->name 	= $pokemon['name'];
		$this->damage 	= $pokemon['damage'];
		$this->hp 		= $pokemon['hp'];
		$this->health 	= $pokemon['hp'];
		$this->type 	= $pokemon['type'];
		$this->color 	= $this->setColor();
		$this->attacks 	= array();

		// Check if there are any attacks
		if(!empty($pokemon['attacks'])){
			// Loop over attacks
			foreach($pokemon['attacks'] as $attack){
				// Create new array with attacks
				$this->attacks[$attack['name']] = ['name'=>$attack['name'], 'damage'=>$attack['damage'], 'type'=>$attack['type']];
				// d($attack);exit();
			}
		}
		else {
			// Set default attack
			$this->attacks['tackle'] = ['name'=>'tackle', 'damage'=>10, 'type'=>$this->type];
		}
	}

	public function __toString(){
		return json_encode($this);
	}

	public function setColor(){
		// loop over types
		switch($this->type){
			// set fire color
			case 'fire':
				$this->color = 'red';
			break;

			// set water color
			case 'water':
				$this->color = 'aqua';
			break;

			// set grass color
			case 'grass':
				$this->color = '#32a852';
			break;
		}

		// output
		return $this->color;
	}

	public function attack($attack, $enemy){
		// attack log
		$message 	= '';
		$effective 	= '';

		// attack log, attacks
		$message .= '<span style=\'color:blue;\'>'.$this->name.'</span> attacked <span style=\'color:blue;\'>'.$enemy->name;
		$message .= '</span> with <span style=\'color:#bf62b1;\'>'.$attack;

		// if pokemon type = attack type
		if($this->type == $this->attacks[$attack]['type']){
			// multiply damage
			$damage = $this->attacks[$attack]['damage'] * 1.2;
		}
		else {
			// default damage
			$damage = $this->attacks[$attack]['damage'];
		}

		// calculate damage based on types
		switch($this->type){
			// fire strength || weakness
			case 'fire':
				// strength
				if($enemy->type == 'grass'){
					$damage = $damage * 1.3;
					$effective .= '[!!] it was super effective';
				}
				// weakness
				elseif($enemy->type == 'water'){
					$damage = $damage * 0.7;
					$effective .= '[!!] it was not very effective ';
				}
			break;

			// water strength || weakness
			case 'water':
				// strength
				if($enemy->type == 'fire'){
					$damage = $damage * 1.3;
					$effective .= '[!!] it was super effective';
				}
				// weakness
				elseif($enemy->type == 'grass'){
					$damage = $damage * 0.7;
					$effective .= '[!!] it was not very effective ';
				}
			break;

			// grass strength || weakness
			case 'grass':
				// strength
				if($enemy->type == 'water'){
					$damage = $damage * 1.3;
					$effective .= '[!!] it was super effective';
				}
				// weakness
				elseif($enemy->type == 'fire'){
					$damage = $damage * 0.7;
					$effective .= '[!!] it was not very effective ';
				}
			break;

		}

		// remove decimals
		$damage = round($damage);

		// attack log, damage
		$message .= '</span> for <span style=\'color:red;\'>'.$damage.'</span> damage.<br />';

		// calculate new enemy health
		$enemy->health = $enemy->health - $damage;

		// attack log, new health
		$message .= $effective.'<br /><span style=\'color:blue;\'>'.$enemy->name.'</span> new health: ';

		// battle is won
		if($enemy->health <= 0){
			// set to 0 if health is negative
			$enemy->health = 0;

			// attack log, new health
			$message .= '<span style=\'color:#17bd54;\'>'.$enemy->health.'</span><br />';
			$message .= '<h3><span style=\'color:blue;\'>'.$this->name.'</span> won.</h3>';

			// echo '<h3><span style=\'color:blue;\'>'.$this->name.'</span> won.</h3>';
		}
		else {
			// attack log, new health
			$message .= '<span style=\'color:#17bd54;\'>'.$enemy->health.'</span><br />';
		}

		// display attack log
		echo $message."<br />";
	}

}






 ?>