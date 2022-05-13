<?php
	session_start();
	include ('srv.php');
	$profpic = "images/1.jpg";
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Your Profile</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css"> 
    body  {
      margin: 0; 
      padding: 0;
	  background-image: url('<?php echo $profpic;?>');
    }
	h2 {
		font-family: "Lucida Handwriting", "cursive";
		color: #9494b8;
	}
	h3 {
		font-family: "Lucida Handwriting", "cursive";
	}
	button {
      background-color: #a3a3c2;
      color: black;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 30%;
	  font-size: 18px;
    }
	button:hover {
		background: #666699;
		color: white;
	}
	table{
	  border-color: #e0e0eb;
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
    <ul class="nav navbar-nav navbar-left">
	  <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
    </ul>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

<center>
	<img src="images/userPurple.png" height="250" width="250"><br><br><br>
	<table border="2" width="350" height="350">
	<tr ><td>
	<center>
	<h2><u> Your account: </u></h2>
	<h3 style="color:#c2c2d6"><?php echo $_SESSION['email']; ?></h3><br><br><br><br>
	
	<a href="logout.php"><button type="button">LogOut</button></a><br>
	
	</center>
	</tr></td></table>
</center>
</body>
</html>		
