<?php
	include ('srv.php');
?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>HoReCa</title>
  <style type="text/css"> 
    body  {
      margin: 0; 
      padding: 0;
      background-color: #f5f5f5;
    }
    text {
      text-align: center;
      font-style: italic;
      font-size: 150px;
      font-family: "Lucida Console", monospace;
    }
    .form-signin {
      max-width: 500px;
      padding: 70px;
    }
    .container{
    max-width: 100% !important;
    width: 100%;
    padding-top: 170px;
    border-radius: 0;
    }
    a{
      text-decoration: none; 
    }
    .card {
      padding: 32px;
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
<!-- -------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" style="color: gray">HoReCa Reviews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
            </ul>
        </div>
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
<!--<center>
  
  <a href="inregistrare_unitate.php?tip_unitate=1">
    <svg width="400" height="800">
      <rect x="35" y="200" rx="10" ry="10" width="350" height="350" style="fill:#466d6d;stroke:#4e7e7e;stroke-width:5;opacity:0.9" />
      <text x="120" y="420" style="fill:#d0e1e1;">Ho</text>
    </svg>
  </a>
  <a href="inregistrare_unitate.php?tip_unitate=2">
    <svg width="400" height="800">
      <rect x="30" y="200" rx="10" ry="10" width="350" height="350" style="fill:#466d6d;stroke:#4e7e7e;stroke-width:5;opacity:0.9" />
      <text x="110" y="420" style="fill:#d0e1e1;">Re</text>
    </svg>
  </a>
  <a href="inregistrare_unitate.php?tip_unitate=3">
    <svg width="400" height="800">
      <rect x="25" y="200" rx="10" ry="10" width="350" height="350" style="fill:#466d6d;stroke:#4e7e7e;stroke-width:5;opacity:0.9" />
      <text x="100" y="420" style="fill:#d0e1e1;">Ca</text>
    </svg>
  </a>
</center>-->
<div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <a href="inregistrare_unitate.php?tip_unitate=1">
                            <div class="card w-100 card-cover h-100 overflow-hidden text-white text-center bg-dark rounded-3 shadow-lg" style="background-image: url('./images/hotel.jpg'); background-size: 101%; background-repeat: no-repeat; background-position: center;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-muted text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-4 lh-1 fw-bold">Hotel</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="inregistrare_unitate.php?tip_unitate=2">
                            <div class="card card-cover h-100 overflow-hidden text-white text-center bg-dark rounded-3 shadow-lg" style="background-image: url('./images/restaurant.jpg'); background-size: 101%; background-repeat: no-repeat; background-position: -1px 70%;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-4 lh-1 fw-bold">Restaurant</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="inregistrare_unitate.php?tip_unitate=3">
                            <div class="card card-cover h-100 overflow-hidden text-white text-center bg-dark rounded-3 shadow-lg" style="background-image: url('./images/cafenea.jpg'); background-size: 102%; background-repeat: no-repeat; background-position: -1px -1px;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-muted text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-4 lh-1 fw-bold">Cafenea</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

</body>
</html>		
