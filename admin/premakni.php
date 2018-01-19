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





<!--
<a href='premakni.php?galerija_id=<?php echo $row["ID"];?>&id=<?php echo $row["album_id"]; ?>'>!Premakni!</a>
http://localhost/foto-galerija/admin/premakni.php?galerija_id=5&id=28
-->
 
           


            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="#" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        <div class="form-group">
                                            Izberite galerijo, kamor želite premakniti izbrano sliko
                           <?php 
            include"povezi.php";

$premakni = mysqli_query ($povezi,"SELECT * FROM album WHERE status='procesiranje'");

echo "<select class='form-control' name='galerija_link'>";
while ($row = mysqli_fetch_assoc($premakni)) {


echo "<option value=$row[ID]>$row[naslov_albuma]</option>";
                                        };
                                        echo "</select>";
                                        
                                        ?>
                                        </div>
                                                                                
                                        <button type="submit" class="btn btn-primary" name="submit">Naprej</button>




<?php



include"povezi.php";



if(isset($_POST['submit'])){
$kljuc1=$_REQUEST['galerija_id']; //galerija.id
$kljuc2=$_REQUEST['id'];	  //galerija.album_id iz URL (stara slika)
$kljuc3=$_POST['galerija_link'];  //album.id

//mysqli_query($povezi, "UPDATE galerija SET tagi='$tagi' WHERE id='$kljuc1'"); tagi example
mysqli_query($povezi,"UPDATE galerija SET album_id='$kljuc3' WHERE ID='$kljuc1'");

echo "<div class='alert alert-success'>Slika uspešno premaknjena!</div>";
//echo "Albumi premaknjeni<br> //$kljuc1 <br> $kljuc2 <br> $kljuc3";



//echo "<script>location.href='premakni_post.php?galerija_id=$kljuc1&?id=$kljuc2'</script>";
//id more zamenjat iz obstoječega na id izbrane galerije
//UPDATE galerija SET album_id='$nov_id_iz_dropdown' WHERE ID="galerija.id" ?

//mysqli_query($povezi,"UPDATE galerija SET album_id='$kljuc3' WHERE album_id='$kljuc2' AND ID='$kljuc1'");


//echo "<script>location.href='galerija_uredi_slike.php?id=$kljuc2'</script>";
//echo "<div class='alert alert-info'> kljuc1 = $kljuc1 <br> kljuc2 = $kljuc2 <br> kljuc3 = $kljuc3</div>";
//echo "<div class='alert alert-danger'> Originalna slika izgine ampak se ne pokaže v pravem albumu. Pridobiti moramo ID od albuma (album.ID) preko forme </div>";
}
?>
                                        
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
