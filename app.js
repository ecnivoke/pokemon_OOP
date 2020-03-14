// define variable
let action_btn 	= document.getElementsByClassName('attack');	// action button
let attack_log 	= document.getElementById('log'); 				// attack log div

// loop over action buttons
for(let i = 0; i < action_btn.length; i++){
	// set events
	action_btn[i].onclick = function makeCall(e) {

		let btn 		= e.target;
		let attack  	= btn.getAttribute('data-attack'); 	// get attack
		let pokemon 	= btn.getAttribute('data-pokemon'); // get pokemon

		let enemy 		= document.getElementsByClassName('name');
		_enemy 			= enemy[0].textContent;
		enemy 			= _enemy == pokemon ? enemy[1].textContent : _enemy;

		// create data object
		let data 		= {
			func:'attack', 				// call attack function
			args:{
				pokemon: 	pokemon, 	// give pokemon name
				enemy: 		enemy,		// give enemy name
				attack: 	attack,		// give attack name
				create: 	false 		// prevents new pokemon

			}
		};

		// make data json object
		data = JSON.stringify(data);

		// make ajax call
		ajax('battle.php', data);
	}
}

// ajax call function
function ajax(url, data) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
console.log(data);
			attack_log.insertAdjacentHTML('beforeend', this.responseText);
		}
	};
	xhttp.open('GET', url+'?data='+data, true);
	xhttp.send();
}

