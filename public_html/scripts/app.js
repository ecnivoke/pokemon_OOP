
// Define variables
let player_container 	= document.getElementsByClassName('player');
let player_button 		= document.getElementsByClassName('pokemon-holder');
let chosing_cnt 		= document.getElementById('chosing');
let player_text 		= ['<span style=\'color:blue\'>P1</span>', '<span style=\'color:red\'>P2</span>'];
let selected 			= [0, 0]; // 2 players
let player 				= 0;

// Set chosing player
chosing_cnt.innerHTML 	= player_text[0]; 

// Loop over buttons
for(let i = 0; i < player_button.length; i++){

	// Set onclick event
	player_button[i].onclick = () => {

		// Swap players
		if(selected[player] == 1){
			// Set player
			player_container[i].innerHTML 	= player_text[player];
			player 							= player == 1 ? player -= 1 : player += 1;

			// Loop over other players
			for(let j = 0; j < player_container.length; j++){

				// Check if not empty
				if(player_container[j].textContent != ''){
					// Swap
					player 							= player == 1 ? player -= 1 : player += 1;
					player_container[j].innerHTML 	= player_text[player];
					
				}
			}
			
			chosing_cnt.innerHTML 			= player_text[player];
		}
		else {
			// Set player text
			player_container[i].innerHTML 	= player_text[player];

			// Set current player
			selected[player] 				= 1;
			player 							= player == 1 ? player -= 1 : player += 1;
			chosing_cnt.innerHTML 			= player_text[player];
		}		
	}
}

