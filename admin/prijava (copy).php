<?php
include 'glava.php';
include 'meni.php';
?>

<!-- Page Content -->
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Prijava</h1>




<div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-3 col-lg-3 col-lg-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-body"> <!--TODO alert-danger spodaj? span/echo?-->
<div class="alert alert-info">
  <strong>Testni uporabniki:</strong><br>
	admin:admin<br>
	test:test<br>
	uporabnik:geslo
</div>
                    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$uporabnik = $_POST['username'];
$geslo = $_POST['password'];
if ($uporabnik == '' || $geslo == '') //ce je username ali password '' (empty) napise error, da ni pravo UN in geslo
	{
        echo "<div class='alert alert-danger'>Vnesite uporabniško ime in geslo!</div>";

}
else
{

//poveze se na bazo prijava in preveri če se uporabnisko ime in geslo ujemata
include "povezi.php";
$result = mysqli_query($povezi, "SELECT * FROM prijava
				 WHERE uporabnisko_ime = '$uporabnik' 
				 AND geslo='$geslo'");


if (mysqli_num_rows($result)>0) //če je več kot 0 rezultatov (torej =>1) in ce je v bazi 4 vrstica pri statusu enaka 'admin' potem se na strani vključi skripta, ki nas redirecta na admin panel
{
   $row = mysqli_fetch_array($result);

   if ($row[3] == 'admin')
	$_SESSION['uname']=$uporabnik; //uporabimo za seje na drugih straneh, da je uporabnik v seji. 
	//TODO: uporabi seje na drugih straneh, kjer je to potrebno
    echo "<script>location.href='admin-domov.php'</script>";

 
}
else
{
  echo " <div class='alert alert-danger'>Vaše uporabniško ime in geslo sta napačna!</div>";
 
 
}
}
}
?>
<form role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
		<div class="form-group">
 			<input class="form-control" placeholder="Uporabniško ime" name="username" type="username" autofocus>
		</div>
		<div class="form-group">
			<input class="form-control" placeholder="Geslo" name="password" type="password" value="">
 		</div>

			<input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Prijavi me!">
	</fieldset>
</form>
				</div>                   
			</div>
		</div>
	</div>
</div>


<p></p>


<!--
      
<div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-3">
                <div class="login-panel panel panel-default">
                    <div class="panel-body">
TODO: prijava + gumbi
<?php include 'prijava-form.php'; ?>

                </div>
            </div>
        </div>
    </div>
</div>
 -->



    </div>
    <!-- /.container -->

<?php include "noga.php"; ?>
