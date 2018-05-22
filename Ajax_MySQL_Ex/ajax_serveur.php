<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "root";
	$dbname = "employes";
	
	//Connection au serveur MySQL
	mysql_connect($dbhost,$dbuser,$dbpass);
	
	//Selection de la base de données
	mysql_select_db($dbname) or die(mysql_error());
	
	//récupérer les données dans les variables
	$dept = $_GET['dept'];
	$salaire = $_GET['salaire'];
	
	// Pour empêcher d'eventuelles injections MySQL
	$dept = mysql_real_escape_string($dept);
	$salaire = mysql_real_escape_string($salaire);
	
	//Formulation d'une requête
	$query = "SELECT nomEmp, posteEmp , salaireEmp  FROM emp WHERE numDept = '$dept'";
	
	if(is_numeric($salaire))
	{
		$query .= " AND salaireEmp > $salaire";
	}
	
	//Execution de la requète
	$qry_result = mysql_query($query) or die(mysql_error());
	
	//Formattage du résultat
	$display_string = "<table>";
	$display_string .= "<tr>";
	$display_string .= "<th>Nom</th>";
	$display_string .= "<th>Poste</th>";
	$display_string .= "<th>Salaire</th>";
	$display_string .= "</tr>";
	
	
	// Insertion D'une nouvelle ligne dans la table pour chaque enregistrement trouvé
	while($row = mysql_fetch_array($qry_result))
	{
		$display_string .= "<tr>";
		$display_string .= "<td>$row[nomEmp]</td>";
		$display_string .= "<td>$row[posteEmp]</td>";
		$display_string .= "<td>$row[salaireEmp]</td>";
		$display_string .= "</tr>";
	}
	
	echo "Requete: " . $query . "<br />";
	$display_string .= "</table>";
	
	echo $display_string;
	?>