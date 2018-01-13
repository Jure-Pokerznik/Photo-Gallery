<?php
include 'glava.php';
include 'meni-admin.php';
?>
<?php 
$kljuc_uredi=$_REQUEST['uredi'];
?>


<!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Nadzorna plošča</h1>


<!--TODO dodaj slikice pred linke -->
<style>@import url(http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
body{margin-top:20px;}
.fa-fw {width: 2em;}</style>



<div class="container-fluid">
  <div class="row">
    <div class="col-sm-3 col-lg-2">
      <nav class="navbar navbar-default navbar-fixed-side">
        
<?php
include 'meni-stranski.php';
?>
	
<?php
//echo $user;
if(isset($_POST['submit']))
{

//vecino copy paste iz dodajalbum.php, spremenjen SQL za update slike preko
//kljuca pridobljenega iz $kljuc_uredi requesta

//$_FILES['userfile']['tmp_name'] začasno ime datoteke ki ga nardi php
$nalozena_slika = $_FILES['nalozi']['tmp_name'];
//Naredimo novo sliko iz naložene, da se lahko spreminja velikost
$originalna = imagecreatefromjpeg($nalozena_slika);

//pridobimo sirino in visino originalne naložene slike
list($sirina,$visina)=getimagesize($nalozena_slika);

//nalozeno sliko spremenimo v manjso (da se lahko uporabi pri urejanju albumov)
$nova_sirina=290;
$nova_visina=($visina/$sirina)*300;
$nova=imagecreatetruecolor($nova_sirina,$nova_visina);

//nalozeno sliko spremenimo v manjso (da se lahko uporabi pri urejanju albumov)
//naredi začasno sliko, ki se kasneje izbriše v imagedestroy
imagecopyresampled($nova,$originalna,0,0,0,0,$nova_sirina,$nova_visina,$sirina,$visina);
$random=rand();
//slika se shrani v mapo zmanjsane_slike in dobi zraven se naključna cela števila, 
//da se slike ne overwritajo, če se naloži več slik, ki imajo isto ime
$filename = "zmanjsane_slike/".$random. $_FILES['nalozi']['name'];
imagejpeg($nova,$filename,100); //nardi novo sliko s qualiteto 100%
imagedestroy($originalna);
imagedestroy($nova); //imagedestroy zbrise slike iz pomnilnika, originalne ostanejo v mapah
$slika=$random.$_FILES['nalozi']['name'];
move_uploaded_file($_FILES["nalozi"]["tmp_name"],"nalozene_slike/".$random.$_FILES["nalozi"]["name"]);


include "povezi.php";
mysqli_query($povezi, "UPDATE album SET slika='$slika' WHERE ID = '$kljuc_uredi'");
//TODO: Izpis alerta na uredialbum strani po redirectu
echo "<script>location.href='uredialbum.php'</script>";
//echo " <div class='alert alert-success'>Uspešno spremenjeno!</div>";
}
	
?>



      </nav>
    </div>
    <div class="col-sm-9 col-lg-10">
      <h3>Uredi Album</h3>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6"><!--multipart/form-data => rabis za file upload-->
                                    <form action="#" method="post" enctype="multipart/form-data" name="nalozi">
                                       Nalozite novo sliko
                                      <div class="form-group">
                                            <input type="file" name="nalozi"  id="nalozi"/>
                                        </div>
                                       
                                       
                                        
                                        <button type="submit" class="btn btn-primary" name="submit">Posodobi</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
  </div>
</div>






</div>

<p></p>


<?php include "noga.php"; ?>
