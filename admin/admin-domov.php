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
      Kaj bomo počeli danes?
	<p>
	<?php
include 'povezi.php';
$albumi = mysqli_query($povezi,"SELECT COUNT(*) AS vsi_albumi FROM album WHERE status='procesiranje'");
$albumi_vrednost = mysqli_fetch_assoc($albumi);
echo "Trenutno število aktivnih albumov: ".$albumi_vrednost['vsi_albumi'].".";
?> </p>
    </div>
  </div>
</div>






</div>

<p></p>


<?php include "noga.php"; ?>
