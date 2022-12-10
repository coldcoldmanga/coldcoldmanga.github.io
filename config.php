<?php 

$conn=mysqli_connect("localhost","root","","library");

if(mysqli_connect_error()){

	echo "Server Connect Failed:".mysqli_connect_error();
}

?>