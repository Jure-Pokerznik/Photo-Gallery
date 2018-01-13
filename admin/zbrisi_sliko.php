<?php

$kljuc_zbrisi=$_REQUEST['zbrisi'];
$status='zbrisano';

include 'povezi.php';
mysqli_query($povezi, "UPDATE album SET status='$status' WHERE ID = '$kljuc_zbrisi'");
echo "<script>location.href='uredialbum.php'</script>"

?> 
