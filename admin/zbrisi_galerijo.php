<?php
//http://localhost/foto-galerija/admin/zbrisi_galerijo.php?galerija_id=54%20&&%20galerija_album_id=28
$kljuc1=$_REQUEST['galerija_id']; //kljuc1 = ID => galerija_id
$kljuc2=$_REQUEST['galerija_album_id']; //kljuc2 = album_id => galerija_album (ključ dobimo iz galerija_uredi_slike.php)
$status='brisanje';

include 'povezi.php';
//v galeriji spremenimo status na brisanje, tako se datoteka vec ne pokaze, ampak se vedno obstaja in jo lahko razveljavimo, če je za to potreba
mysqli_query($povezi,"UPDATE galerija SET status='$status' WHERE ID='$kljuc1'"); //sliko možno povrniti s spremembo statusa na procesiranje

//alternativno - mysqli_query($povezi,"DELETE FROM galerija WHERE ID='$kljuc1'"); //slike ni možno povrniti


//vrne nas na stran enake galerije iz katere smo brisali
echo "<script>location.href='galerija_uredi_slike.php?id=$kljuc2'</script>"
//TODO: Dodaj 'Razveljavi' gumb
?> 
