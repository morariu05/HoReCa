<?php
	session_start();
	include ('srv.php');
	//$profpic = "images/1.jpg";
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Home</title>
  <style> 
    body  {
      margin: 0; 
      padding: 0;
	  /*background-image: url('<?php echo $profpic;?>');*/
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
<!-- ---------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">HoReCa Reviews</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
    </div>
	<div class="dropdown text-end">
        <a href="#" class="d-block link-light text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
			<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">
				<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
				<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
			</svg>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-end p-10 text-muted" style="max-width: 300px;">
			<p style="text-align: center; font-size: 14px;"><u> Your account is: </u></p>
			<p style="text-align: center; color: #666699"><?php echo $_SESSION['email']; ?></p>
			<hr>
			<p style="text-align: center;"><a href="logout.php" style="color: #666699;">Log Out</a></p>
		</div>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

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