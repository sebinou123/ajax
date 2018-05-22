<head>
	<meta charset="UTF-8">
		<style>
		div#formulaire{
		width:800px;
		height:200px;
		margin:0px auto;
		}
		div#memory_board{
			background:#CCC;
			border:#999 1px solid;
			width:800px;
			height:540px;
			padding:24px;
			margin:0px auto;
		}
		div#memory_board > div{
			background: url(<?php echo base_url('assets/images/img.jpg');?>) no-repeat center;
			background-size: 120px 120px;
			border:#000 1px solid;
			width:71px;
			height:71px;
			float:left;
			margin:10px;
			padding:20px;
			font-size:64px;
			cursor:pointer;
			text-align:center;
		}
		</style>
		<script>

		//variable décrivant le début et la fin du timer
		var start;
		var end;
		//tableau des valeur possible des cartes
		var memory_array = ['A','A','B','B','C','C','D','D','E','E','F','F','G','G','H','H','I','I','J','J','K','K','L','L'];
		//tableau regroupant les valeurs des cartes
		var memory_values = [];
		//tableau regroupant les id des cartes
		var memory_tile_ids = [];
		//un drapeau indicant si la carte est retournée
		var tiles_flipped = 0;
		//un constructeur qui crée la fonction shuffle qui permet de mélanger les cartes
		Array.prototype.memory_tile_shuffle = function(){
			var 	i = this.length, 
					j, 
					emp;
			while(--i > 0){
				j = Math.floor(Math.random() * (i+1));
				//Pertmet de permuter les valeurs dans le tableau
				//ainsi les cartes sont mélangés
				temp = this[j];
				this[j] = this[i];
				this[i] = temp;
			}
		}

		//fonction qui permet de créer une nouvelle table de jeux
		function newBoard(){
		 start = new Date().getTime();
		 document.f.lastname.value = "";
			tiles_flipped = 0;
			document.f.firstname.value = 0;
			var output = '';
			memory_array.memory_tile_shuffle(); //
			for(var i = 0; i < memory_array.length; i++){
			//une boucle qui crée les div de cartes avec une appelle de fonction onclick sur chacune pour gérer les retournement de carte
				output += '<div id="tile_'+i+'" onclick="memoryFlipTile(this,\''+memory_array[i]+'\')"></div>';
			}
			document.getElementById('memory_board').innerHTML = output; //
		}

		function memoryFlipTile(tile,val){
			if(tile.innerHTML == "" && memory_values.length < 2){		//si la valeur de la carte est null, donc le dos est visible et que la table de valeur ne contient pas déjà deux carte
				tile.style.background = '#565A6A';			//change l'arrière plan pour blanc puisque la carte est retouné
				tile.innerHTML = val;			
				if(memory_values.length == 0){			//si il n'y a pas de valeur  dans le tableau, aucune carte
					memory_values.push(val);			//ajoute une valeur au tableau memory value
					memory_tile_ids.push(tile.id);		//ajoute une valeur au tableau memory id
				} else if(memory_values.length == 1){
					memory_values.push(val);
					memory_tile_ids.push(tile.id);
					if(memory_values[0] == memory_values[1]){	//si les deux carte on la même valeur, elles sont pair
					document.f.firstname.value = parseInt(document.f.firstname.value) + 1;
					if(parseInt(document.f.firstname.value) == 12)
					{
						end = new Date().getTime();
						var time = (end - start)/1000;
						document.f.lastname.value = time;
					}
						tiles_flipped += 2;						//conteur pour savoir le nombre de carte trouvé
						// deux tableau permettant de comparer la valeur de la carte et l'id de la carte
						memory_values = [];
						memory_tile_ids = [];
						// Si toute les paire sont trouvé, on recommence une partie
						if(tiles_flipped == memory_array.length){
							alert("Tableau effacé ... générer nouveau tableau");
							document.getElementById('memory_board').innerHTML = "";
							newBoard();
						}
					} else {
						function flip2Back(){
							// 
							var tile_1 = document.getElementById(memory_tile_ids[0]);
							var tile_2 = document.getElementById(memory_tile_ids[1]);
							
							tile_1.style.background = 'url(<?php echo base_url('assets/images/img.jpg');?>) no-repeat center';	//Change l'image pour le dos de la carte 1 
							tile_1.style.backgroundSize = '120px 120px';
							tile_1.innerHTML = "";
							tile_2.style.background = 'url(<?php echo base_url('assets/images/img.jpg');?>) no-repeat center';	//Change l'image pour le dos de la carte 2
							tile_2.style.backgroundSize = '120px 120px';
							tile_2.innerHTML = "";
							
							// 
							memory_values = [];
							memory_tile_ids = [];
						}
						setTimeout(flip2Back, 700); //Attend 700 milliseconde avant de retourner les cartes
					}
				}
			}
		}
		</script>
	</head>
<div id="memory_board"></div>
	<script>newBoard();</script>
	<div id="formulaire">
    <FORM name="f">
    <INPUT type="button" name="nom" value= "Une nouvelle partie!"
    onclick="newBoard()">
	Nombre de correspondances:
	<input type="text" name="firstname" id="correspond">
	Temps mis:
	<input type="text" name="lastname" id="temps">
    </FORM>
	</div>