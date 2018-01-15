<?php
$uredi=$_POST['galerija_link']; //pridobimo galerija_link iz uredigalerijo.php

//echo $uredi;
header("Location:galerija_uredi_slike.php?id=$uredi");
?>
