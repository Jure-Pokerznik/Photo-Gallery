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
      <h3>Spremeni ključne besede</h3>






 
           
<?php 
//http://localhost/foto-galerija/admin/zbrisi_galerijo.php?galerija_id=48&galerija_album_id=31
//http://localhost/foto-galerija/admin/kb.php?galerija_id=48&id=31



include"povezi.php";



if(isset($_POST['submit']))
{
	$tagi = $_POST['tagi'];
	$kljuc1=$_REQUEST['galerija_id']; //kljuc1 = ID => galerija_id
	$kljuc2=$_REQUEST['id']; //kljuc2 = album_id => galerija_album_id [cng to id]

mysqli_query($povezi, "UPDATE galerija SET tagi='$tagi' WHERE id='$kljuc1'");
echo "<div class='alert alert-success'>Ključne besede spremenjene!</div>";
//echo "$kljuc1 <br> $kljuc2 <br> $tagi";
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
