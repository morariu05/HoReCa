<?php
	include ('srv.php');
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
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
    img {
      max-width: 10%;
      height: auto;
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
        <a class="navbar-brand" style="color: gray">HoReCa Reviews</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active text-success" aria-current="page" href="home.php">Home</a>
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
        <img src="<?php echo $unitate['cod_QR'] ?>" > 
        <h2 class="fw-normal"><?php echo $unitate['nume']; ?></h2>
        <p><?php echo $unitate['descriere']; ?></p>
        <p><?php echo $unitate['adresa']; ?></p>
        <p><?php echo $unitate['telefon']; ?></p>
        <a class="btn btn-outline-danger" href="unitate.php?delete_UnitateHoReCa=<?php echo $unit?>" name="btn_stergeUnitate">Șterge</a>
        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Editează</button>          
      </div> 
            
      <!-- Modal editare Unitate-->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editează Unitate</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method='post'>
              <div class="modal-body">
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" name="nume" value="<?php echo $unitate['nume'];?>" placeholder="nume">
                  <label for="floatingInput">Numele Unității: </label>
                </div><br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" name="descriere" value="<?php echo $unitate['descriere'];?>" placeholder="descriere">
                  <label for="floatingInput">Descrierea Unității: </label>
                </div><br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" name="adresa" value="<?php echo $unitate['adresa'];?>" placeholder="adresa">
                  <label for="floatingInput">Adresa: </label>
                </div><br>
                <div class="form-floating">
                  <input type="text" class="form-control" id="floatingInput" name="telefon" value="<?php echo $unitate['telefon'];?>" placeholder="adresa">
                  <label for="floatingInput">Număr de contact: </label>
                </div><br>
                <div class="form-floating">
                  <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $unitate['email'];?>" placeholder="email">
                  <label for="floatingInput">Email: </label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                <button type="submit" name="editare_unitate" class="btn btn-primary">Salvează modificările</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Sfarsit Modal editare Unitate -->

      <div class="row featurette">
        <div class="col-md-6">
          <h2 class="f-heading">Criterii prestabilite</h2>
          <p> Pentru această categorie de review-uri au fost acordate note de la 1 la 10. </p><br>
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
                <td> 
                  <?php
                    $id_unitate = $_GET['id_UnitateHoReCa'];
                    $id_TipReview = $row['id_TipReview'];
                    $query_review1 = mysqli_query($db, "SELECT AVG(Review_Obligatoriu.valoare_tip_review) FROM Review INNER JOIN Review_Obligatoriu ON Review_Obligatoriu.id_Review = Review.id_Review AND Review.id_UnitateHoReCa = $id_unitate AND Review_Obligatoriu.id_TipReview = $id_TipReview;");
                    
                    $medie = mysqli_fetch_array($query_review1);
                    if($medie[0] == null){
                      $medie[0] = 0;
                    }
                    if($medie[0] < 5){
                      echo "<span class='badge rounded-pill bg-danger'>";
                    }
                    else if($medie[0] < 8){
                      echo "<span class='badge rounded-pill bg-warning'>";
                    }
                    else{
                      echo "<span class='badge rounded-pill bg-success'>";
                    }
                    echo number_format((float)$medie[0], 2, '.', '');  // Outputs -> 105.00  
                    echo "</span>";  
                  ?>
                </td>
              </tr>
              <?php $i++; } ?>
            </tbody>
		      </table><br>
        </div>
                
        <div class="col-md-6">
          <h2 class="f-heading">Criterii optionale</h2>
          <p> Pentru această categorie de review-uri au fost acordate note de la 0 la 10. </p><br>
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
                <td>
                  <?php
                    $id_unitate = $_GET['id_UnitateHoReCa'];
                    $id_facilitate = $row['id_Facilitate'];
                    $query_review2 = mysqli_query($db, "SELECT AVG(Review_Facilități.valoare_review_facilitate) FROM Review INNER JOIN Review_Facilități ON Review_Facilități.id_Review = Review.id_Review AND Review.id_UnitateHoReCa = $id_unitate AND Review_Facilități.id_Facilitate = $id_facilitate;");

                    $medie = mysqli_fetch_array($query_review2);
                    if($medie[0] == NULL){
                      $medie[0] = 0;
                    }
                    if($medie[0] < 5){
                      echo "<span class='badge rounded-pill bg-danger'>";
                    }
                    else if($medie[0] < 8){
                      echo "<span class='badge rounded-pill bg-warning'>";
                    }
                    else{
                      echo "<span class='badge rounded-pill bg-success'>";
                    }
                    echo number_format((float)$medie[0], 2, '.', '');  // Outputs -> 105.00  
                  ?>
                </td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table><br>
        </div>
      </div>

      <div class="container px-4 py-4" id="hanging-icons">
        <h2 class="f-heading">Comentarii</h2><br>
        <div class="row g-4 py-5 row-cols-1 row-cols-lg-4">
          <?php 
            $query = mysqli_query($db, "SELECT * FROM Review WHERE id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");
              $i = 1; 
              while ($row = mysqli_fetch_array($query)) { 
                if($row['impresii_generale']){
                  $query_nume = mysqli_query($db, "SELECT Reviewer.nume FROM Review INNER JOIN Reviewer ON Review.id_Reviewer = Reviewer.id_Reviewer AND Review.id_UnitateHoReCa = $unitate[id_UnitateHoReCa] AND Review.impresii_generale != '';");
                  $nume = mysqli_fetch_array($query_nume);
          ?>
          <div class="testimonial-item rounded p-4">
            <i class="fa fa-quote-left fa-2x text-success mb-3"></i>
            <p><?php echo $row['impresii_generale'];?></p>
            <div class="d-flex align-items-center">
              <img src="./images/users.png">
              <div class="ps-3">
                <h6 class="mb-1"><?php echo $nume[0];?></h6>
                <small><?php echo $row['data_actuala']; ?></small>
              </div>
            </div>
          </div>
          <?php $i++; }} ?>
        </div>
      </div>
    </center>
  </div>
</div>

</center>  
</body>
</html>
