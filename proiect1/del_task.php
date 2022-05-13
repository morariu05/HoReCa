<?php
	include ('srv.php');
	
	
	if (isset($_POST['deleteTaskBtn'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM todo WHERE id='1'");
		header('location: home.php');
	}
?>