<?php
	$link = mysqli_connect("ip", "username" , "password", "database");

    if (mysqli_connect_error()){
        die ("Database Connection Error");
    }
?>