<?php
//ce posljemo podatke preko POST forme, ki je spodaj
if($_SERVER['REQUEST_METHOD'] == 'POST'){
$uime = $_POST['uporabnisko_ime'];
$geslo = $_POST['geslo'];
if($uime == '' || $geslo == ''){ echo "Vpišite uporabniško ime in geslo!";} //ce je uporabnisko ime ali geslo prazno napise da ju je treba vpisat
}
else{
include "povezi.php"; //poveze na bazo

$result = mysqli_query($povezi, "SELECT * FROM prijava
				  WHERE uime = '$uime'
				  AND   geslo = '$geslo'"); //poveze se na bazo in v prijavi preveri, če se uporabnik in geslo ujemata
if (mysqli_num_rows($result)>0)
{
   $row = mysqli_fetch_array($result);

   //if ($row[3]=='admin') //ce je status (row[3]) admin potem te vrze na admin-domov stran
	$_SESSION['uname']=$uime;
    echo "<script>location.href='admin-domov.php'</script>";

}
else
{
  echo " Uporabnisko ime ali geslo ni pravilno!";
  echo ""; 
 
}
}

?>
                        <form role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Uporabnisko ime" name="uporabnisko_ime" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Geslo" name="geslo" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Login">
                            </fieldset>
                        </form>
                    
                    

