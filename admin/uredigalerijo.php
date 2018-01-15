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

<?php
		
		if(isset($_POST['submit']))
{
$ename = $_POST['galerija_link'];
}
			?>


<div class="row">
                                <div class="col-lg-6">
                                    <form action="galerija_link_uredi_slike.php" method="post" enctype="multipart/form-data" name="upload">
                                       
                                        <div class="form-group">
                                            <label>Izgerite galerijo za urejanje</label>
<?php
include "povezi.php";
$result = mysqli_query($povezi,"SELECT * FROM album WHERE status='procesiranje'");
echo "<select class='form-control' name='galerija_link'>";
while ($row = mysqli_fetch_assoc($result)) {


echo "<option value=$row[ID]>$row[naslov_albuma]</option>";
                                        };
										echo "</select>";
										
										?>
                                        </div>
                                                                                
                                        <button type="submit" class="btn btn-primary" name="submit">Naprej</button>
                                        
                                    </form>
                                </div>
                                </div>







    </div>
  </div>
</div>






</div>

<p></p>


<?php include "noga.php"; ?>
