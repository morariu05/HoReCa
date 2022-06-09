<?php
	include ('srv.php');
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>User</title>
	<link href="./css/style.css" rel="stylesheet">
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
            <li><a class="dropdown-item disabled" href="#" style="text-align:center;font-size: 13px;"></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php" style="text-align:center; font-size: 14px;">Deconectare</a></li>
        </ul>
        </div>
    </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
			<div class="col-xl-10 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25">
                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                </div>
                                <h6 class="f-w-600"><?php echo $result['nume'];?></h6>
                                <p><?php echo $result['prenume'];?></p>
                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                        	<div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informații</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Email</p>
                                        	<h6 class="text-muted f-w-400"><?php echo $result['email'];?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                        	<p class="m-b-10 f-w-600">Username</p>
                                            <h6 class="text-muted f-w-400"><?php echo $result['username'];?></h6>
                                        </div>
                                    </div><br>
									<h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Unități</h6>
									<div class="row">
                                        <div class="col-sm-4">
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '1'");
                                            $nrHoteluri = mysqli_num_rows($query);
                                        ?>
                                            <p class="m-b-10 f-w-600">Hoteluri</p>
                                            <h6 class="text-muted f-w-400"><?php echo $nrHoteluri;?></h6>
                                        </div>
										<div class="col-sm-4">
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '2'");
                                            $nrRestaurante = mysqli_num_rows($query);
                                        ?>
                                            <p class="m-b-10 f-w-600">Restaurante</p>
                                            <h6 class="text-muted f-w-400"><?php echo $nrRestaurante;?></h6>
                                        </div>
                                        <div class="col-sm-4">
                                        <?php
                                            $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = $_SESSION[id] AND id_TipUnitate = '3'");
                                            $nrCafenele = mysqli_num_rows($query);
                                        ?>
                                        	<p class="m-b-10 f-w-600">Cafenele</p>
                                            <h6 class="text-muted f-w-400"><?php echo $nrCafenele;?></h6>
                                        </div>
                                    </div><br>
                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Proiecte</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">Recente</p>
                                            <h6 class="text-muted f-w-400"><?php echo $nrCafenele + $nrRestaurante + $nrHoteluri;?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                        	<p class="m-b-10 f-w-600">Total reviews</p>
                                            <h6 class="text-muted f-w-400">4543</h6>
                                        </div>
                                    </div>
									<br><hr><br>
                                       <button>Editează</button>    
									   <button>Schimbă parola</button>                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        	</div>
        </div>
    </div>
</body>
</html>