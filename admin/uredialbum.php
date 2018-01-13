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
      <h3>Uredi Album</h3>

                        <div class="panel-body">
                           <div class="table-responsive table-bordered">
                           <?php
include "povezi.php";
if (isset($_GET["stran"])) { $stran = $_GET["stran"]; } else { $stran=1; };
$zacetnastran = ($stran-1) * 10;
$result = mysqli_query ($povezi, "SELECT * FROM album WHERE status='procesiranje' ORDER BY ID DESC LIMIT $zacetnastran, 10");
?>
<!--table za izpis-->
<table class="table">
	<thead>
		<tr>
			<th width="20%">Ime albuma</th>
			<th width="30%">Opis</th>
			<th width="25%">Predogled slike</th>
			<th colspan=2 width="25%">Izbriši in popravi</th>
		</tr>
	</thead>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>

<tbody>
	<tr>	<!-- 	uredi_sliko = spremeni thumbnail;
 			uredi_album = spremeni name, desc -->
		<td> <?php echo $row["naslov_albuma"]; ?> </td>
		<td><?php echo $row["opis_albuma"]; ?></td>
		<!--uredi_sliko.php?uredi=(številka vrstice (ID) iz baze)-->
		<td><a href='uredi_sliko.php?uredi=<?php echo  $row["ID"];?>'><img src="zmanjsane_slike/<?php echo $row["slika"]; ?>"  width="290px"/>Zamenjaj sliko<!--290 max ker so thumbnaili 290--></a></td>
		<td><a href='zbrisi_sliko.php?zbrisi=<?php echo $row["ID"]; ?>'>Izbriši</a> | <a href = 'uredi_album.php?uredi=<?php echo $row["ID"]; ?> &ime_a=<?php echo $row["naslov_albuma"]; ?> &opis_a=<?php echo $row["opis_albuma"]; ?>&slika_a=<?php echo $row["slika"]; ?> '>Uredi</a>
<!--TODO: spremeni linke za slikice; posebej link za urejanje thumbnaila? -->
                                        </tr>
										
										</tbody>

<?php
};
?>
</table>
<!--strani-->
<?php
$result = mysqli_query($povezi,"SELECT COUNT(naslov_albuma) FROM album");
$row = mysqli_fetch_row($result);
$total_records = $row[0]; //preveri kolko je vseh albumov
$total_pages = ceil($total_records / 10); //vse albume deli z 10 (torej če je =>11 vnosov bo pokazalo dodatno/e strani)
for ($i=1; $i<=$total_pages; $i++) { 
echo "<a href='uredialbum.php?stran=".$i."' class='navigation_item selected_navigation_item'>".$i."</a> ";
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
