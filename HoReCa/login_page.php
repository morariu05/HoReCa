<?php
	include('srv.php');
?>
<html>
<head> 
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Login</title>
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
      max-width: 500px;
      padding: 70px;
    }
  </style>
</head>
<body>

<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">HoReCa Reviews |</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="register_page.php">Sign Up</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

	<center>
    <main class="form-signin w-100 m-auto">
      <form action="login_page.php" method='post'>
        <img class="mb-4" src="images/user.png" alt="" width="150" height="150"> 
        <h1 class="h3 mb-3 fw-normal">Login</h1>
        <?php include('./errors.php'); ?>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
          <label for="floatingInput">e-mail sau username</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingInput" name="password" placeholder="password" required>
          <label for="floatingInput">parola</label>
        </div><br>
        <button class="w-100 btn btn-lg btn-primary" type="submit" name="loginBtn">Login</button>
      </form>
      <font size="2.5px" color="black">Nu ai un cont? Creeaza unul </font><a href="register_page.php"><u> aici. </u></a><br><br>
    </main>
	</center>  
</body>
</html>		