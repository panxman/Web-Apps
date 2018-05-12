<?php
	session_start();

	if (array_key_exists("logout", $_GET)) {
        
        session_destroy();

        header("Location: index.php");
        
    }

?>