<?php
	session_start();
	include ('srv.php');
	$profpic = "images/1.jpg";
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>To-Do List</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style> 
    body  {
      margin: 0; 
      padding: 0;
	  background-image: url('<?php echo $profpic;?>');
    }
	input {
      background-color: #c2c2d6;
      color: #3c5d5d;
      padding: 13px 10px;
      margin: 5px 0;
      border-style: ridge;
	  border-color: #8585ad;
      cursor: pointer;
      width: 70%;
    }
	button {
      background-color: #3d3d5c;
      color: white;
      padding: 10px 10px;
      margin: 5px 10px;
      border-style: ridge;
	  border-color: #8585ad;
      cursor: pointer;
      width: 20%;
    }
	p {
		margin: 5px 25px;
	}
	table .addTable{
	  border-style: inset;
	  border-color: #8585ad;
	}
	table .taskTable{
	  border-style: inset;
	  border-color: #8585ad;
	}
	.add_btn:hover{
		color: green;
	}
	.deleteBtn:hover{
		color: red;
	}
  </style>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">To-Do List |</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
	  <li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
    </ul>
  </div>
</nav>
<!-- -------------------------------------------------------------------------------------------------- -->

<center><br>
	<h1><font color="#bf80ff">Things To Do:</font></h1><br>
	
		<table class="addTable" border="1" width="800">
		  <tr bgcolor="#5c5c8a"><td>
		  <form action="home.php" method='post' name="task"><br>
			<p><b>New to-do:</b><br>
			<center>
			 <input type="text" name="task" class="task_input">
			 <button type="submit" name="addTaskBtn" id="add_btn" class="add_btn">Add Task</button>
			</center>
		  </form></td></tr>
		</table><br><br>
		
		<table class="taskTable" border="1" cellspacing="0 2px" cellpadding="0" width="800">
		  <tr bgcolor="#5c5c8a"><td>
			
			<center>
				<?php
					$tasks = mysqli_query($db, "SELECT * FROM todo");
					$i = 1; 
					while ($row = mysqli_fetch_array($tasks)) { 
				?>
				<form action="home.php?del_task=<?php echo $row['id'] ?>" method='post'>
						<input type="text" placeholder="<?php echo $row['task']; ?>" disabled>
						<button type="submit" name="deleteTaskBtn" class="deleteBtn"> Delete task</button>
						</form><?php $i++; } ?>
			</center>
		 </td></tr>
		</table><br><br>
</center>  
<?php
if (isset($_POST['deleteTaskBtn'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM todo WHERE id='$id'");
		header('location: home.php');
	}
?>
</body>
</html>