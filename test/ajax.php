<?php

 $myData = $_POST['data'];
 
 list($userid, $password) = explode('|', $myData);
 
 include "functions.php";
 
 $statement = "INSERT INTO validusers ";
 $statement .= "(userid, password) ";
 $statement .= "VALUES (";
 
 $statement .= "'".$userid."', '".$password."')";
 
 $rtn = iduResults($statement);
 
 print "Insert Result Code: $rtn";
 ?>