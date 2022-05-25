<?php
	session_start();
	include ('srv.php');
	$profpic = "images/1.jpg";
?>
<html>
<head> 	
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Your Profile</title>
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand">HoReCa Reviews |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="bi bi-caret-down"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="user.php">Profile</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

<center>
	<img src="images/userPurple.png" height="250" width="250"><br><br><br>
	<table border="2" width="350" height="350">
	<tr ><td>
	<center>
	<h2><u> Your account: </u></h2>
	<h3 style="color:#c2c2d6"></h3><br><br><br><br>
	
	<a href="logout.php"><button type="button">LogOut</button></a><br>
	
	</center>
	</tr></td></table>
</center>
</body>
</html>		
