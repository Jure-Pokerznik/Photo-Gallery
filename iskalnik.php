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
<div class="col-md-4 col-sm-5 col-lg-4 col-xs-8 col-sm-offset-6 col-md-offset-7 col-lg-offset-8 col-xs-offset-2">
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

<div class="row"><h3>
<?php $isci = $_POST['iskalnik'];
echo "Zadetki za: ".$isci;?></h3></div>
	<div class="row">




<?php 
if(isset($_POST['iskalnik'])){

$result = mysqli_query($povezi,"SELECT * FROM galerija WHERE status='procesiranje' AND tagi LIKE '%$isci%' ");
while ($row = mysqli_fetch_assoc($result)){

$naslov = $row['naslov_galerije'];
$slika  = $row['slika_galerija'];
$tagi   = $row['tagi'];


?>

<div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <img class="card-img-top" src="admin/zmanjsane_slike_galerija/<?php echo "$slika";?>"></a>
            <div class="card-body">
              <h4 class="card-title">
                <?php echo "$naslov";?></a>
              </h4> <?php $out = str_replace(',', ', ', $tagi); //dodamo presledek?>
              <p class="card-text">Ključne besede:<br><?php echo "$out";?></p> <!--TODO: Tagi str_replace za space-->
            </div><!--card title-->
          </div><!--card h-100-->
        </div><!--class-->

<?php }
}; //while?>


	</div><!--row-->
</div><!--container-->

<?php include "noga.php"; ?>
