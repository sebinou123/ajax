<?php
function connectDatabase()
{
    $db = mysqli_connect('localhost', 'root', 'root', 'test');;
    
    if(!$db)
    {
        print "Unable to connect";
    }
    
    return $db;
}

function iduResults($statement){
    $output = "";
    $outputArray = array();
    
    $db = connectDatabase();
    
    if($db){
        $result = $db->query($statement);
        
        
        if(!$result){
            $output .= "ERROR";
        }else{
            $output = $db->affected_rows;
        }
    }else{
        $output = 'ERROR-No DB Connection';
    }
    
    return $output;
}
?>
