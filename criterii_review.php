<?php
	include('srv.php');
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Înregistrare Unitate</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
  <link href="./css/carousel.css" rel="stylesheet">
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
      padding: 15px;
    }
    .form-add {
      max-width: 500px;
      padding: 10px;
    }
    .table {
      max-width: 700px;
      text-align: left;
    }
    .t {
      text-align: center;
    }
    .b {
      text-align: right;
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

<div class="col-md-12">
    <h2 class="featurette-heading">
      <?php
        $tip_unitate = $_GET['tip_unitate'];
        if($tip_unitate == 1){
          echo "Criterii de review pentru Hotel";
        }
        else if($tip_unitate == 2){
          echo "Criterii de review pentru Restaurant";
        }
        else if($tip_unitate == 3){
          echo "Criterii de review pentru Cafenea";
        }
        else {
          echo "Criterii de review";
        }
      ?>
    </h2><br>
  </div>
  <hr class="featurette-divider">
<div class="row featurette">
  <div class="col-md-6">
    <h2 class="featurette-heading">Criterii prestabilite.</h2>
    <p class="lead">Criteriile prestabilite sunt acele criterii pentru care orice Unitate înregistrată va fi evaluată de către clienți pentru a ajuta la o filtrare mai eficientă a rezultatelor.</p>
  </div>
  <div class="col-md-6">
    <?php
      $tip_unitate = $_GET['tip_unitate'];
      $_SESSION['tip_unitate'] = $tip_unitate;
        if($tip_unitate == 1){
          echo '<h5 class="featurette-headingg">Confort</h5>';
          echo '<h5 class="featurette-headingg">Curățenie</h5>';
          echo '<h5 class="featurette-headingg">Personal</h5>';
          echo '<h5 class="featurette-headingg">Locație</h5>';
          echo '<h5 class="featurette-headingg">Raport preț/calitate</h5>';
          echo '<h5 class="featurette-headingg">Aspect/Ambianță/Amenajare</h5>';
        }
        else if($tip_unitate == 2){
          echo '<h5 class="featurette-headingg">Calitate</h5>';
          echo '<h5 class="featurette-headingg">Diversitate</h5>';
          echo '<h5 class="featurette-headingg">Servire</h5>';
          echo '<h5 class="featurette-headingg">Locație</h5>';
          echo '<h5 class="featurette-headingg">Aspect/Ambianță/Amenajare</h5>';
        }
        else if($tip_unitate == 3){
          echo '<h5 class="featurette-headingg">Calitate produse</h5>';
          echo '<h5 class="featurette-headingg">Raport preț/calitate</h5>';
          echo '<h5 class="featurette-headingg">Diversitate</h5>';
          echo '<h5 class="featurette-headingg">Servire</h5>';
          echo '<h5 class="featurette-headingg">Locație</h5>';
          echo '<h5 class="featurette-headingg">Aspect/Ambianță/Amenajare</h5>';
        }
      ?>
  </div>
</div>

  <hr class="featurette-divider">
  <h2 class="featurette-heading">Criterii opționale.</h2>
  <p class="lead">Criteriile opționale pentru review vor fi adăugate în funcție de fiecare Unitate care se dorește a fi evaluată, pe baza facilităților de care asteasta dispune. </p><br><br><br>

<form action="home.php" method='post'>
  <div class="row featurette">
    <div class="col-md-12">
      <table class="table table-striped">
        <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col" class="t">Criterii</th>
          <th scope="col"></th>
        </tr>
        </thead>
      
        <tbody>
          <tr>
            <?php
              $tasks = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Tip_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Tip_Unitate ON Facilități.id_Facilitate = Facilități_Tip_Unitate.id_Facilitate AND Facilități_Tip_Unitate.id_TipUnitate = $_SESSION[tip_unitate];");
              $i = 1; 
              while ($row = mysqli_fetch_array($tasks)) { 
            ?>
              <td><?php echo $i;?></td>
              <td class="t"><?php echo $row['nume_Facilitate'];?></td>
              <td class="b"><input class="form-check-input" type="checkbox" name="criteriu[]" value="<?php echo $row['id_Facilitate'];?>" id="flexCheckDefault"></td>
          </tr>
          <?php $i++; } ?>
        </tbody>
      </table><br><br>
    </div>
  </div><br>
  <button class="w-100 btn btn-lg btn-success" type="submit" name="Inregistreaza">Înregistrare</button><br>
</form>
</center> 
</body>
</html>		
