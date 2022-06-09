<?php
	include('srv.php');
?>
<html>
<head> 
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script><meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <title>Register</title>
  <style type="text/css"> 
    body  {
      margin: 0;
      padding: 0;
      background-color: #f5f5f5;
    }
    input {
      margin: 5px 0;
    }
    .error {
      color: red;
      font-size: 15px;
    }
    .form-signin {
      max-width: 600px;
      padding: 60px;
    }
    a {
      color: green;
    }
    a:hover{
      color:black;
    }
  </style>
</head>
<body>
<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color: green">HoReCa Reviews</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login_page.php">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->
<center>
    <main class="form-signin w-100 m-auto">
      <form action="register_page.php" method='post'>
        <img class="mb-4" src="images/user.png" alt="" width="150" height="150"> 
        <h1 class="h3 mb-3 fw-normal">Register</h1>
        <?php include('./errors.php'); ?>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="first_name" value="<?php echo $first_name;?>" placeholder="nume" required>
          <label for="floatingInput">Nume</label>
        </div>
		<div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="last_name" value="<?php echo $last_name;?>" placeholder="prenume" required>
          <label for="floatingInput">Prenume</label>
        </div>
		<div class="form-floating">
          <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $email;?>" placeholder="name@example.com" required>
          <label for="floatingInput">Adresa de e-mail</label>
        </div>
		<div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="username" value="<?php echo $username;?>" placeholder="nume" required>
          <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingInput" name="password" placeholder="password" required>
          <label for="floatingInput">Parola</label>
        </div><br>
        <button class="w-100 btn btn-lg btn-success" type="submit" name="registerBtn">Register</button>
      </form>
      <font size="2.5px" color="black">Ai deja un cont?</font>
      <a href="login_page.php"><u>Login </u></a><br><br>
    </main>
</center> 
</body>
</html>		
