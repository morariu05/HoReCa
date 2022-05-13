<?php
	include('srv.php');
	$profpic = "images/1.jpg";
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css"> 
    body  {
	  font-family: Arial, sans-serif;
      margin: 80px 0; 
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
	.obl {
		color: red;
		margin-left: 20px;
	}

  </style>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">To-Do List |</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login_page.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

	<center>
	  <img src="images/user.png" height="150" width="150">
	  <h2><font color="black">Register</font></h2><br> 
	  <table border="1px solid" width="500">
		<tr bgcolor=" #d1d1e0"><td>
		<form action="register_page.php" method='post'><br>
		  <center>
		  <?php include('./errors.php'); ?>
		   <p><b>Nume</b><br>
			 <input type="text" name="first_name" size="40" maxlength="15" value="<?php echo $first_name;?>" required><span class="error"> * </span></p>
		   <p><b>Prenume</b><br>
			 <input type="text" name="last_name" size="40" maxlength="30" value="<?php echo $last_name;?>" required><span class="error"> * </span></p>
		   <p><b>Adresa</b><br>
			 <input type="text" name="address" size="40" maxlength="30" value="<?php echo $address;?>"></p>
		   <p><b>Nr. de telefon</b><br>
			 <input type="text" name="phone" size="40" maxlength="30" value="<?php echo $phone;?>"></p>
		   <p><b>Adresa de email</b><br>
			 <input type="email" name="email" size="40" maxlength="40" value="<?php echo $email;?>" required><span class="error"> * </span></p>
		   <p><b>Parola</b><br>
			 <input type="password" name="password" size="40" maxlength="30" required><span class="error"> * </span></p><br>
		   <button type="submit" name="registerBtn">Register</button></a><br>
			 <font color="red" size="2px"> * camp obligatoriu!</font>
			 </center>
		</form></td></tr>
	  </table><br>
	  <font size="2.5px" color="#f2e6ff">Ai deja un cont?</font> <a href="login_page.php"><u><b>Login</b></u></a><br><br><br><br>
	</center>  

</body>
</html>		
