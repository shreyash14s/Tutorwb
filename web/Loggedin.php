	<?php
	$name = $_GET["name"];
	$email = $_GET["email"];
	echo '<script>';
	echo 'localStorage.setItem("name","'.$name.'");';
	echo 'localStorage.setItem("email","'.$email.'");';
	echo 'window.location = "tutorial.html";';
	echo '</script>';
	?>
