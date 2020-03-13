// define variable
let attack_btn 	= document.getElementById('attack');
let attack  	= attack_btn.getAttribute('data-attack');
let data 		= {attack:''};

// assemble data
data.attack 	= attack;
data 			= json_encode(data); // werkt dit???????????????????????

// ajax call function
function ajax(url, data) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this.responseText);
		}
	};
	xhttp.open('GET', url+'?data='+data, true);
	xhttp.send();
}

console.log(data);

// ajax('battle.php', data);
// index.php?data=data

