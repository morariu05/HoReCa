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
  <link href="../css/carousel.css" rel="stylesheet">
  <style> 
    body  {
      margin: 0; 
      padding: 0;
    }
	  .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }
    h2{
      margin-left: 70px;
    }
    .comm {
      margin-left: 90px;
    }
    .c{
      margin-left: -20px;
    }
  </style>
</head>
<body>
<!-- ---------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php" style="color: gray">HoReCa Reviews</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="register_page.php" class="nav-item nav-link" disabled></a>
            </div>
            <a href="../start_page.php" class="btn rounded-pill text-success py-2 px-4 ms-lg-5">Înregistrează-ți Unitatea</a>
        </div>
    </div>
</nav>
<!-- ---------------------------------------------------------------------------------------------------- -->

<?php
  $id = $_SESSION['id'];
  $unit = $_GET['id_UnitateHoReCa'];

  $query_unitate = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_UnitateHoReCa = $unit");
  $unitate = mysqli_fetch_assoc($query_unitate);

  $query_review = mysqli_query($db, "SELECT * FROM Review WHERE id_UnitateHoReCa = $unit");
  $row = mysqli_fetch_array($query_review);

  $query_nume = mysqli_query($db, "SELECT Reviewer.nume FROM Review INNER JOIN Reviewer ON Review.id_Reviewer = Reviewer.id_Reviewer AND Review.id_UnitateHoReCa = $unit");
  $nume = mysqli_fetch_array($query_nume);
?>

<div class="b-example-divider"></div> 
<div class="b-example-divider"></div>

<h2 class="f-heading"> Salutare <b><i><?php echo $nume['nume'];?></i></b>,</h2><br>

<div class="comm">
  <p class="lead">mulțumim pentru review!</p><br>

  <p class="lead">Punctajul acordat pentru <i><b> <?php echo $unitate['nume']?> </b></i> este unul de: ??? </p>
  <p class="lead c">alături de comentariul: <i><b> <?php echo $row['impresii_generale'];?> </b></i></p><br><br><br>

  <a href="../index.php"><button type="button" class="btn btn-outline-dark round-pill">Revino la pagina principală</button></a>
</div><br><br><br>

<div class="b-example-divider"></div>
<div class="b-example-divider"></div>
</body>
</html>