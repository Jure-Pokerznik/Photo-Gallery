<?php
include 'glava.php';
include 'meni-admin.php';
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
    


      </nav>
    </div>
    <div class="col-sm-9 col-lg-10">
      <h3>Dodaj Album</h3>






<div id="page-wrapper">
<!--TODO Dodaj check za jpg-->
           
<?php
//če je v spodnji formi bil poslan submit request preko POST 
if(isset($_POST['submit']))
{
$naslov_albuma = $_POST['naslov_albuma'];
$opis_albuma = $_POST['opis_albuma'];
$status='procesiranje';
//spremenljivka za ustvarjanje naključnih celih števil
$random=rand();
//$_FILES['userfile']['tmp_name'] začasno ime datoteke ki ga nardi php
$nalozena_slika = $_FILES['nalozi']['tmp_name'];
//Naredimo novo sliko iz naložene, da se lahko spreminja velikost
$originalna = imagecreatefromjpeg($nalozena_slika);

//TODO:
//https://stackoverflow.com/questions/13596794/resize-images-with-php-support-png-jpg
//Support za png

//pridobimo sirino in visino originalne naložene slike
list($sirina,$visina)=getimagesize($nalozena_slika);

//nalozeno sliko spremenimo v manjso (da se lahko uporabi pri urejanju albumov)
//naredi začasno sliko, ki se kasneje izbriše v imagedestroy
$nova_sirina=290;
$nova_visina=($visina/$sirina)*300;
$nova=imagecreatetruecolor($nova_sirina,$nova_visina);
//destination,source,x,y,x,y,destination_w,destination_h,source_w,source_h
imagecopyresampled($nova,$originalna,0,0,0,0,$nova_sirina,$nova_visina,$sirina,$visina);
//slika se shrani v mapo zmanjsane_slike in dobi zraven se naključna cela števila, 
//da se slike ne overwritajo, če se naloži več slik, ki imajo isto ime
$filename = "zmanjsane_slike/".$random. $_FILES['nalozi']['name'];
//nardi novo sliko s qualiteto 100%
imagejpeg($nova,$filename,100);
//imagedestroy zbrise slike iz pomnilnika, originalne ostanejo v mapah
imagedestroy($originalna);
imagedestroy($nova); 
$slika=$random.$_FILES['nalozi']['name'];
move_uploaded_file($_FILES["nalozi"]["tmp_name"],"nalozene_slike/".$random.$_FILES["nalozi"]["name"]);

if (empty($naslov_albuma))
{
 echo " <div class='alert alert-danger'>Prazne vrstice niso dovoljene!</div>"; 
 }
else
{
include "povezi.php";

$query="INSERT INTO album (naslov_albuma,opis_albuma,slika,status) VALUES ('$naslov_albuma','$opis_albuma','$slika','$status')";
if(mysqli_query($povezi,$query))
    {
echo " <div class='alert alert-success'>Album dodan.</div>";
    }
    else
    {
        print mysqli_error(); //TODO: komentiraj to ko vse dela, zaradi erorrjev pri empty stringih
    }

   }
}   
?>

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Naložite slike (formata jpg)
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6"><!--multipart/form-data => rabis za file upload-->
                                    <form action="#" method="post" enctype="multipart/form-data" name="nalozi">
                                       
                                        <div class="form-group">
                                            <label>Naslov albuma</label>
                                            <input class="form-control" placeholder="Naslov (primer: Drevesa)" name="naslov_albuma">
                                        </div>
                                        <div class="form-group">
                                            <label>Opis albuma</label>
                        <textarea class="form-control" rows="4" placeholder="Opis" name="opis_albuma"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Slika albuma</label>
                                            <input type="file" name="nalozi"  id="nalozi" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Dodaj album</button>
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
</div>






</div>

<p></p>


<?php include "noga.php"; ?>
