<?php
	include ('../srv.php');
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
<!-- ---------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php" >HoReCa Reviews</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="register_page.php" class="nav-item nav-link" disabled></a>
            </div>
            <a href="../start_page.php" class="btn rounded-pill text-success py-2 px-4 ms-lg-5">Înregistrează-ți Unitatea</a>
        </div>
    </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

<center>

<?php 
    $titlu = $_GET['tip_unitate'];
    $sql = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_TipUnitate = $titlu;"); 
    if($titlu == 1){
        $titlu = 'Hoteluri';
    }else if($titlu == 2){
        $titlu = 'Restaurante';
    }else{
        $titlu = 'Cafenele';
    }
?>
<div class="container px-4 py-5" id="hanging-icons">
    <h2 class="pb-2 border-bottom" style="text-align: left"><?php echo $titlu ?></h2> 
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">   
        <?php
        $i = 1; 
        if(mysqli_num_rows($sql) == 0){
            echo '<h5>Nu exista hoteluri de afisat. </h5>'; 
        }
        while ($row = mysqli_fetch_array($sql)) { 
        ?>
        <div class="d-flex justify-content-center">
        <div>
            <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
            <h2 class="fw-normal"><?php echo $row['nume']?></h2>
            <p><?php echo $row['descriere']?></p>
            <a class="btn btn-outline-success" href="review-unitate.php?id_UnitateHoReCa=<?php echo $row['id_UnitateHoReCa']?>">Vezi mai mult &raquo;</a>
        </div>
        </div>
        <?php $i++; } ?>
    </div>
</div>

<div class="b-example-divider"></div>
</body>
</html>