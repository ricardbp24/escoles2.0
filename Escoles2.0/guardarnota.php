<?php
$g=$_REQUEST["g"];
$primer=$_REQUEST["primer"];
$segon=$_REQUEST["segon"];
$tercer=$_REQUEST["tercer"];

    require_once('classes/connexio.php');
    $bd = new connexio();
    
    
    if($bd->query("UPDATE Notes SET 1T = $primer , 2T = $segon , 3T = $tercer  WHERE ID = $g ")){
        echo "<span class='glyphicon glyphicon-ok'></span>";
    } else {
	echo "Error: %s\n", $bd->error;
    }
	$bd->close();