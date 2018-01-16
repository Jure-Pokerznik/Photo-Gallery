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
      <h3>Uredi Galerijo</h3>

                        <div class="panel-body">
                           <div class="table-responsive table-bordered">
                           <?php
include "povezi.php";
$id_album = $_REQUEST['id']; //
if (isset($_GET["stran"])) { $stran = $_GET["stran"]; } else { $stran=1; };
$zacetnastran = ($stran-1) * 10;
$result = mysqli_query ($povezi, "SELECT * FROM galerija WHERE status='procesiranje' AND album_id='$id_album' ORDER BY ID DESC LIMIT $zacetnastran, 10");
?>
<!--table za izpis-->
<table class="table">
	<thead>
		<tr>
			<th width="50%">Ime in tagi</th>
			<th width="25%">Predogled slike</th>
			<th colspan=2 width="25%">Uredi</th>
		</tr>
	</thead>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>

<tbody>
<tr>	<!-- th ime -->
	<td><?php echo "<b>Ime:</b> ".$row["slika_galerija"]; ?><br><br><?php echo "<b>Ključne besede: </b>".$row["tagi"]; ?></td>
	<!-- th predogled -->
	<td><a href='spremeni_sliko_galerija.php?zbrisi=<?php echo  $row["ID"];?>&id=<?php echo $row["album_id"]; ?>'><img src="zmanjsane_slike_galerija/<?php echo $row["slika_galerija"]; ?>" width="290px" />Spremeni sliko</a></td>

	<!-- th izbrisi in premakni -->
	<td><a href='zbrisi_galerijo.php?galerija_id=<?php echo $row["ID"]; ?>&galerija_album_id=<?php echo $row["album_id"]; ?>'>Izbriši</a><br><a href='premakni.php?galerija_id=<?php echo $row["ID"];?>&id=<?php echo $row["album_id"]; ?>'>!Premakni!</a><br><a href='#?galerija_id=<?php echo $row["ID"];?>&id=<?php echo $row["album_id"]; ?>'>!Spremeni ključne besede!</a> 
                                        </tr>
										</tbody>

<?php
};
?>
</table>
<!--strani-->
<?php
$result = mysqli_query($povezi,"SELECT COUNT(album_id) FROM galerija WHERE album_id='$id_album' AND status='procesiranje'");
$row = mysqli_fetch_row($result);
$vsi_albumi = $row[0]; //preveri kolko je vseh albumov
$strani = ceil($vsi_albumi / 10); //vse albume deli z 3 (torej če je =>4 vnosov bo pokazalo dodatno stran)
for ($i=1; $i<=$strani; $i++) { 
echo "<a href='galerija_uredi_slike.php?stran=$i&id=$id_album'>".$i."</a> ";//TODO: dodaj class
};
?>

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
