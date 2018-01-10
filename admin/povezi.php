<?php 
//povezi se na bazo
$povezi = mysqli_connect("localhost","root","","foto_album");
//ce je povezava neuspesna jo zapri
if (!$povezi){
	die();
}
?>
