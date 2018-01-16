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
      <h3>Spremeni Sliko v Galeriji</h3>






 
           
<?php
//$mykey1=$_REQUEST['key0'];
//$asid2=$_REQUEST['asid2'];

$kljuc1=$_REQUEST['zbrisi'];
$kljuc2=$_REQUEST['id2'];
include"povezi.php";


if(isset($_POST['submit'])){

$uploadedfile = $_FILES['nalozi']['tmp_name'];
$zacasno_ime = imagecreatefromjpeg($uploadedfile);
list($sirina,$visina)=getimagesize($uploadedfile);


$nova_sirina=($sirina/$visina)*150;
$nova_visina=150;
$nova=imagecreatetruecolor($nova_sirina,$nova_visina);
imagecopyresampled($nova,$zacasno_ime,0,0,0,0,$nova_sirina,$nova_visina,$sirina,$visina);

$filename = "zmanjsane_slike_galerija/".$_FILES['nalozi']['name'];;

imagejpeg($nova,$filename,100);
imagedestroy($zacasno_ime);
imagedestroy($nova);

$slika=$_FILES['nalozi']['name'];
move_uploaded_file($_FILES["nalozi"]["tmp_name"],"nalozene_slike_galerija/".$_FILES["nalozi"]["name"]);


mysqli_query($povezi,"UPDATE galerija SET slika_galerija='$slika' WHERE ID='$kljuc1'");
echo "<script>location.href='galerija_uredi_slike.php?ids=$kljuc2'</script>";
//echo "SUCESS!";
}
?>






            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="nalozi">
                                       
                                        
                                        <div class="form-group">
                                            <label>Slike</label>
                                            <input type="file" name="nalozi"  id="nalozi" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Naloži</button>
                                        
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
            </div>






















</div>

<p></p>


<?php include "noga.php"; ?>
