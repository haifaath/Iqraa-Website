<?php
$database = mysqli_connect("localhost", "root", "", "market");

	/* check connection */
	if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

?>