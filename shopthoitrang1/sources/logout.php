<?php

	
	unset($_SESSION['cart']);
	unset($_SESSION['login_member']);
	header("Location:http://$config_url/index.html");
?>
