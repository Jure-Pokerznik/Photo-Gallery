<?php 
//$albumid=$_REQUEST['ID']; //galerija
include "glava.php";
include "meni.php";
include "povezi.php";
?>



<!-- Page Content --> 
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Galerije</h1>
<div class="row">
<div class="col-lg-4 col-sm-6 portfolio-item"></div>
<div class="col-lg-4 col-sm-6 portfolio-item"></div>
<div class="col-lg-4 col-sm-6 portfolio-item">
<form role="form" method="post" action="iskalnik.php" id="isci">
      <div class="form-group">
       <input type="text" name="iskalnik" id="iskalnik" class="form-control">
      </div>
      <div align="right">
        <input id="isci" class="btn btn-primary" value="Išči" type="submit">
      </div>
    </form>
</div>

</div>

	<div class="row">




<?php //TODO: iskalnik

//TODO: kategorije / tipi albumov -> recimo živali, rastline, stavbe,..
$result = mysqli_query($povezi,"SELECT * FROM album WHERE status='procesiranje'");
while ($row = mysqli_fetch_assoc($result)){

$slika_albuma=$row['slika'];
$naslov_albuma=$row['naslov_albuma'];
$opis_albuma=$row['opis_albuma'];
$slika=$row['slika']; //alt
$album_status=$row['status'];

?>

<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="galerija.php?id=<?php echo $row["ID"];?>"><img class="card-img-top" src="admin/zmanjsane_slike/<?php echo $row['slika'];?>"></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="galerija.php?id=<?php echo $row["ID"];?>"><?php echo "$naslov_albuma";?></a>
              </h4>
              <p class="card-text"><?php echo "$opis_albuma";?></p>
            </div><!--card title-->
          </div><!--card h-100-->
        </div><!--class-->

<?php } //while?>


	</div><!--row-->
</div><!--container-->

<?php include "noga.php"; ?>
