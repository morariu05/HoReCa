<?php
	include('srv.php');
	$profpic = "images/1.jpg";
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css"> 
    body  {
	  font-family: Arial, sans-serif;
      margin: 0 0; 
      padding: 0;
      background-image: url('<?php echo $profpic;?>');
    }
    input {
      background-color: #c2c2d6;
      color: #3c5d5d;
      padding: 13px 20px;
      margin: 7px 0;
      border: none;
      cursor: pointer;
      width: 85%;
    }
	button {
      background-color: #8585ad;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 70%;
    }
	.error {
		color: red;
		font-size: 15px;
	}
	
  </style>
</head>
<body>

<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">To-Do List |</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register_page.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
    </ul>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

	<center>
	  <img src="images/user.png" height="150" width="150">
	  <h2><font color="black">Login</font></h2><br>

	  <table border="1" width="500">
		<tr bgcolor="#d1d1e0"><td>
		<form action="login_page.php" method='post'><br>
		  <center><br>
		   <p><b>Adresa de email</b><br>
			  <input type="text" name="email" size="40" maxlength="40" value="<?php echo $email;?>" required /><span class="error"> * </span></p>
		   <p><b>Parola</b><br>
			  <input type="password" name="password" maxlength="30" required ><span class="error"> * </span></p><br>
		   <button type="submit" name="loginBtn">Login</button></a><br>
			 <font color="red" size="2px"> * camp obligatoriu!</font>
		  </center>
		</form></td></tr>
	  </table><br>
	  <font size="2.5px" color="#f2e6ff">Nu ai un cont? Creeaza unul </font><a href="register_page.php"><u><b> aici. </b></u></a><br><br>
	</center>  
</body>
</html>		