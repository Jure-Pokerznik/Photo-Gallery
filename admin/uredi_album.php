<?php
include 'glava.php';
include 'meni-admin.php';

//http://localhost/foto-galerija/admin/uredi_album.php?uredi=33%20&zbrisi=test%20&opis_a=test&slika_a=1103573215podgana.jpg
$kljuc_id 	= $_REQUEST['uredi']; //1 = ID
$kljuc_naslov	= $_REQUEST['ime_a']; //2 = Ime albuma
$kljuc_opis 	= $_REQUEST['opis_a']; //3 = Opis albuma
//$slika	= $_REQUEST['slika_a']; //4 = Slika -> uredi_sliko.php
$br 		= "<br>";
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
      <h3>Uredi Album</h3>


<?php
if(isset($_POST['submit']))
{
$naslov_albuma = $_POST['naslov_a'];
$opis_albuma = $_POST['opis_a'];
$status='procesiranje'; //preveri ce je status bil v osnovi spremenjen pri ustvarjanju prvotnega albuma
if (empty($naslov_albuma))
{
 echo " <div class='alert alert-danger'>Vnesite naslov albuma!</div>"; 
}
else
{
include "povezi.php";

mysqli_query($povezi,"UPDATE album SET naslov_albuma='$naslov_albuma',opis_albuma='$opis_albuma' WHERE ID = '$kljuc_id'");
//echo "<script>location.href='uredialbum.php'</script>"; //redirect takoj
echo " <div class='alert alert-success'>Album spremenjen! <a href='uredialbum.php'>Prikaži</a></div>"; //alert + link

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
                                       <div class="alert alert-info"><?php echo "Trenutno urejate:".$br."ID = ".$kljuc_id.$br."Naslov albuma = ".$kljuc_naslov.$br."Opis = ".$kljuc_opis;?></div>
                                        <div class="form-group">
                                            <label>Naslov albuma</label><!--name="aname"-->
                                            <input class="form-control" placeholder="Naslov albuma (primer: Drevesa)" name="naslov_a" value="<? echo $kljuc_naslov ?>"><!--value echo prikaze prejsnje ime albuma-->
                                        </div>
                                       <div class="form-group">
                                        
                                            <label>Opis albuma</label>
                                             <textarea class="form-control" rows="4" placeholder="Opis albuma..." name="opis_a" ><? echo $kljuc_opis ?></textarea>
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
</div>






</div>

<p></p>


<?php include "noga.php"; ?>
