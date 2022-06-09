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
    body  {
      margin: 0; 
      padding: 0;
    }
	  .table {
      max-width: 500px;
      text-align: left;
    }
    .table p{
      margin-top: 0;
      margin-bottom: 1px;
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

<center><br><br><br>
<div class="container marketing">	
	<div class="row">
        <center>
        <?php
          $id = $_SESSION['id'];
          $unit = $_GET['id_UnitateHoReCa'];
          $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_Administrator = '$id' AND id_UnitateHoReCa = '$unit' ");
          $unitate = mysqli_fetch_assoc($query);
          if(mysqli_num_rows($query) == 0){
            header("location:http://localhost/HoReCa/proiect%20final/home.php");
          }
        ?>
          <div class="col-lg-5">
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg><br>

            <h2 class="fw-normal"><?php echo $unitate['nume']; ?></h2>
            <p><?php echo $unitate['descriere']; ?></p>
            <p><?php echo $unitate['adresa']; ?></p>
            <p><?php echo $unitate['telefon']; ?></p>
            <a class="btn btn-outline-danger" href="unitate.php?delete_UnitateHoReCa=<?php echo $unit?>" name="btn_stergeUnitate">Șterge</a>
            <a class="btn btn-outline-info" href="unitate.php?delete_UnitateHoReCa=<?php echo $unit?>" name="btn_stergeUnitate">Editează</a>
          </div> 
            
            <div class="row featurette">
              <div class="col-md-6">
                <h2 class="f-heading">Criterii prestabilite.</h2><br>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <?php
                        $tasks = mysqli_query($db, "SELECT Tip_Review.numeTipReview, Tip_Review_Tip_Unitate.id_TipReview FROM Tip_Review INNER JOIN Tip_Review_Tip_Unitate ON Tip_Review.id_TipReview = Tip_Review_Tip_Unitate.id_TipReview AND Tip_Review_Tip_Unitate.id_TipUnitate = $unitate[id_TipUnitate]");
                        $i = 1; 
                        while ($row = mysqli_fetch_array($tasks)) { 
                      ?>
                      <td></td>
                      <td><p><?php echo $row['numeTipReview'];?></p></td>
                      <td></td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
		            </table><br>
              </div>
                
              <div class="col-md-6">
                <h2 class="featurette-heading">Criterii optionale.</h2>
                <table class="table table-striped">
                  <tbody>
                    <tr>
                      <?php
                        $tasks = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Unitate ON Facilități.id_Facilitate = Facilități_Unitate.id_Facilitate AND Facilități_Unitate.id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");
                        $i = 1; 
                        while ($row = mysqli_fetch_array($tasks)) { 
                      ?>
                      <td></td>
                      <td><p><?php echo $row['nume_Facilitate'];?></p></td>
                      <td></td>
                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table><br>
              </div>
        </center>
    </div>
</div>

</center>  
</body>
</html>