<?php 
//$albumid=$_REQUEST['ID']; //galerija
include "glava.php";
include "meni.php";
include "povezi.php";
?>
<!--
Lightbox modals
https://www.w3schools.com/howto/howto_js_lightbox.asp
--><!--
<script>
// Open the Modal
function openModal() {
  document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<style>
.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}

/* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1200px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #999;
  text-decoration: none;
  cursor: pointer;
}

/* Hide the slides by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  padding: 2px 16px;
  color: white;
}

img.demo {
  opacity: 0.6;
}

.active,
.demo:hover {
  opacity: 1;
}

img.hover-shadow {
  transition: 0.3s
}

.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
}
</style> -->
<link href="vendor/litebox-master/assets/css/litebox.css" rel="stylesheet" type="text/css" media="all" />
<!-- Page Content --> 
    <div class="container">

      <!-- Page Heading -->
      <h1 class="my-4">Galerije</h1>

	<div class="row">

<?php //TODO: iskalnik

//TODO: kategorije / tipi albumov -> recimo živali, rastline, stavbe,..

$id_album_galerija = $_REQUEST["id"]; //iz index.php pridobimo ?id=xx kar predstavlja galerija.album_id

$result = mysqli_query($povezi,"SELECT * FROM galerija WHERE album_id='$id_album_galerija' AND status='procesiranje'");
while ($row = mysqli_fetch_assoc($result)){

//$slika_albuma=$row['slika_galerija'];
//$naslov_albuma=$row['naslov_galerije'];
$tagi=$row['tagi'];
$slika=$row['slika_galerija'];
//$status=$row['status'];

echo "<div class='card h-100'>
		<a href='admin/nalozene_slike_galerija/$slika' class='inline-block galerija'>
		<img src='admin/zmanjsane_slike_galerija/$slika' height='100%' width='100%' class='inline-block'/></a>
	<div class='card-body'>
              <p class='card-text'><b>Ključne besede: </b><br>$tagi</p>
            </div>
	</div>";

?>






<?php } //while?>


<p></p>
	

	</div><!--row-->
</div><!--container-->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script src="vendor/litebox-master/assets/js/smoothscroll.min.js" type="text/javascript"></script>
	<script src="vendor/litebox-master/assets/js/images-loaded.min.js" type="text/javascript"></script>
	<script src="vendor/litebox-master/assets/js/litebox.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$('.galerija').liteBox();
	</script>




<?php include "noga.php"; ?>
