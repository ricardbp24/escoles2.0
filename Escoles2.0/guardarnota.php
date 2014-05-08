<?php
$g=$_REQUEST["g"];
$primer=$_REQUEST["primer"];
$segon=$_REQUEST["segon"];
$tercer=$_REQUEST["tercer"];
    require_once('classes/connexio.php');
$sql = "UPDATE Notes SET 1T = $primer , 2T = $segon , 3T = $tercer  WHERE ID = ";
    $sql = $sql.$g;
    
    echo "guardat";
        
	
        
