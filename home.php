<?php
	include ('srv.php');
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Home</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
  <link href="./css/carousel.css" rel="stylesheet">
  <style>
  .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
  }
  .back-to-top {
    position: fixed;
    right: 45px;
    bottom: 45px;
    z-index: 99;
    padding: 15px;
    border-radius: 50%;
    background-color: green;
  }
  .add{
    border-radius: 50%;
    background-color: green;
    height: 50px;
    width: 50px;
    padding-top: 12px;
    margin-top: 100px;
  }
  .back-to-top:hover{
    background-color: black;
    transform: scale(1.1);
  }
  
  </style>
</head>
<body>
  <?php 
    if($_SESSION['autentificare'] == false)
    {
      header("location:http://localhost/HoReCa/proiect%20final/index.php");
    }
  ?>
<!-- ---------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: green">HoReCa Reviews</a>
    <ul class="navbar-nav">
      <li class="nav-item btn btn-outline-success">
        <a class="nav-link" href="horeca.php"> + Adaugă unități</a>
      </li>
    </ul>
    <div class="dropdown dropstart">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-person-circle" viewBox="0 0 16 16">          <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
          <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
      </a>
      <?php
        $id = $_SESSION['id'];
        $query = mysqli_query($db, "SELECT * FROM Administrator_Unitate WHERE id_Administrator = '$id'");
        $result = mysqli_fetch_assoc($query);
      ?>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
      <li><a class="dropdown-item disabled" style="text-align:center" href="#"><?php echo $result['nume']." ".$result['prenume'];?></a></li>
        <li><a class="dropdown-item" href="user.php" style="text-align:center;font-size: 13px;">Vezi profilul tau &raquo;</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="logout.php" style="text-align:center; font-size: 14px;">Deconectare</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

<center>

<div class="b-example-divider"></div>

<h2 class="featurette-heading"> Unități adăugate </h2><br><br>

<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom" style="text-align: left">Hoteluri</h2> 
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">   
    <?php
      $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '1';");
      $i = 1; 
      if(mysqli_num_rows($query) == 0){
        echo '<h5>Nu exista hoteluri inregistrate. </h5>'; 
      }
      while ($row = mysqli_fetch_array($query)) { 
    ?>
    <div class="d-flex justify-content-center">
      <div>
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal"><?php echo $row['nume']?></h2>
        <p><?php echo $row['descriere']?></p>
        <a class="btn btn-outline-success" href="unitate.php?id_UnitateHoReCa=<?php echo $row['id_UnitateHoReCa']?>">Vezi mai mult &raquo;</a>
      </div>
    </div>
    <?php $i++; } ?>
    <center>
      <a href="http://localhost/HoReCa/proiect%20final/inregistrare_unitate.php?tip_unitate=1" class="btn btn-success add" style="">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
      </a>
    </center>
  </div>
</div>

<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="hanging-icons" >
  <h2 class="pb-2 border-bottom" style="text-align: left">Restaurante</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <?php
      $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '2';");
      $i = 1; 
      if(mysqli_num_rows($query) == 0){
        echo '<h5>Nu exista restaurante inregistrate. </h5>'; 
      }
      while ($row = mysqli_fetch_array($query)) { 
    ?>
    <div class="d-flex justify-content-center">
      <div>
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
        <h2 class="fw-normal"><?php echo $row['nume']?></h2>
        <p><?php echo $row['descriere']?></p>
        <a class="btn btn-outline-success" href="unitate.php?id_UnitateHoReCa=<?php echo $row['id_UnitateHoReCa']?>">Vezi mai mult &raquo;</a>
      </div>
    </div>
    <?php $i++; } ?>
    <center>
      <a href="http://localhost/HoReCa/proiect%20final/inregistrare_unitate.php?tip_unitate=2" class="btn btn-success add" style="">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
      </a>
    </center>
  </div>
</div>

<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="hanging-icons">
  <h2 class="pb-2 border-bottom" style="text-align: left">Cafenele</h2>
  <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
    <?php
      $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '3';");
      $i = 1; 
      if(mysqli_num_rows($query) == 0){
        echo '<h5>Nu exista cafenele inregistrate. </h5>'; 
      }
      while ($row = mysqli_fetch_array($query)) { 
    ?>
    <div class="d-flex justify-content-center">
      <div>
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      <h2 class="fw-normal"><?php echo $row['nume']?></h2>
        <p><?php echo $row['descriere']?></p>
        <a class="btn btn-outline-success" href="unitate.php?id_UnitateHoReCa=<?php echo $row['id_UnitateHoReCa']?>">Vezi mai mult &raquo;</a>
      </div>
    </div>
    <?php $i++; } ?>
    <center>
      <a href="http://localhost/HoReCa/proiect%20final/inregistrare_unitate.php?tip_unitate=3" class="btn btn-success add" style="">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
      </a>
    </center>
  </div>
</div>

<div class="b-example-divider"></div>
</center>  

<a href="home.php" class="btn btn-success back-to-top">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
  </svg>
</a>

</body>
</html>