<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "ajax";
	
	//Connection au serveur MySQL
	mysql_connect($dbhost,$dbuser,$dbpass);
	
	//Selection de la base de données
	mysql_select_db($dbname) or die(mysql_error());
	
	//récupérer les données dans les variables
	$age = $_GET['age'];
	$sex = $_GET['sex'];
	$wpm = $_GET['wpm'];
	
	// Pour empêcher d'eventuelles injections MySQL
	$age = mysql_real_escape_string($age);
	$sex = mysql_real_escape_string($sex);
	$wpm = mysql_real_escape_string($wpm);
	
	//Formulation d'une requête
	$query = "SELECT * FROM ajax_table WHERE sex = '$sex'";
	
	if(is_numeric($age))
	{
		$query .= " AND age <= $age";
	}
	
	if(is_numeric($wpm))
	{
		$query .= " AND wpm <= $wpm";
	}
	
	//Execution de la requète
	$qry_result = mysql_query($query) or die(mysql_error());
	
	//Formattage du résultat
	$display_string = "<table>";
	$display_string .= "<tr>";
	$display_string .= "<th>Nom</th>";
	$display_string .= "<th>Age</th>";
	$display_string .= "<th>Sexe</th>";
	$display_string .= "<th>WPM</th>";
	$display_string .= "</tr>";
	
	
	// Insertion D'une nouvelle ligne dans la table pour chaque enregistrement trouvé
	while($row = mysql_fetch_array($qry_result))
	{
		$display_string .= "<tr>";
		$display_string .= "<td>$row[name]</td>";
		$display_string .= "<td>$row[age]</td>";
		$display_string .= "<td>$row[sex]</td>";
		$display_string .= "<td>$row[wpm]</td>";
		$display_string .= "</tr>";
	}
	
	echo "Requete: " . $query . "<br />";
	$display_string .= "</table>";
	
	echo $display_string;
	?>