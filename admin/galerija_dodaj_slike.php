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
      <h3>Dodaj Galerijo</h3>






 
           
<?php $ID_albuma=$_REQUEST['id']; //zahtevamo ID albuma, da se lahko kasneje shrani v bazo od galerije
include"povezi.php";

$result = mysqli_query ($povezi,"SELECT * FROM album WHERE ID='$ID_albuma'");

while ($row = mysqli_fetch_assoc($result)) {
$aname=$row["naslov_albuma"]; 
};

$galerijaid=$ID_albuma; //ID galerije = ID albuma -> slike od galerije se shranjujejo v isti id albuma kar pomeni da se te slike pokažejo samo kadar smo v pravilnem idju. 
$galerijaime=$aname; //ime slike galerije = imenu albuma






$status='procesiranje';
$random=rand();
include"povezi.php";



if(isset($_FILES['nalozi'])){
    $errors= array();
    foreach($_FILES['nalozi']['tmp_name'] as $kljuc => $zacasno_ime){
        $ime_datoteke = $kljuc.$random.$_FILES['nalozi']['name'][$kljuc];
        //$file_size =$_FILES['nalozi']['size'][$kljuc];
        $zacasna_datoteka =$_FILES['nalozi']['tmp_name'][$kljuc];
        //$file_type=$_FILES['nalozi']['type'][$kljuc];   
        $tagi = $_POST['tagi'];

        
        $lokacija="nalozene_slike_galerija";
        if(empty($errors)==true){
         if(is_dir("$lokacija/".$ime_datoteke)==false){
            
$originalna = imagecreatefromjpeg($zacasno_ime);
list($sirina,$visina)=getimagesize($zacasno_ime);
$nova_sirina=($sirina/$visina)*150;
$nova_visina=150;
$nova=imagecreatetruecolor($nova_sirina,$nova_visina);
imagecopyresampled($nova,$originalna,0,0,0,0,$nova_sirina,$nova_visina,$sirina,$visina);
$random=rand();
$filename = "zmanjsane_slike_galerija/".$ime_datoteke;
imagejpeg($nova,$filename,100);
imagedestroy($originalna);
move_uploaded_file($zacasna_datoteka,"$lokacija/".$ime_datoteke); //move_uploaded_file ( string $filename , string $destination )
            }else{                                  //datoteki dodamo čas dodajanja, da ob nalaganju isto poimenovanih datotek ne pride do prepisa. 
                $nova_lokacija="$lokacija/".$ime_datoteke.time();
                 rename($zacasna_datoteka,$nova_lokacija) ;               
            }
              $query="INSERT INTO galerija (`ID`,`album_ID`,`naslov_galerije`,`slika_galerija`,`tagi`,`status`) VALUES('','$galerijaid','$galerijaime','$ime_datoteke','$tagi','$status')";
         mysqli_query($povezi,$query);          
        }
        else
        {
         
         print_r($errors);
        
        }
    }
    if(empty($errors)){
    echo " <div class='alert alert-success'>Nalaganje uspešno!</div>";
    
    }
}

    
?>






            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        
                                        <div class="form-group">
                                            <label>Slike</label>
                                            <input type="file" name="nalozi[]" multiple  id="upload" />
                                        </div>
                    <div class="form-group">
                                            <label>Tagi (Uporabite , za dodajanje več tagov)</label>
	<!-- https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/ -->
                                            <input data-role="tagsinput" type="text" name="tagi" id="tagi" />
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
