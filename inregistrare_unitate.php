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
      max-width: 600px;
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
        <a class="navbar-brand" style="color: gray">HoReCa Reviews</a>
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
<center>

<div class="col-md-12">
    <h2 class="featurette-heading">
      <?php
        $tip_unitate = $_GET['tip_unitate'];
        if($tip_unitate == 1){
          echo "Înregistrează Hotel";
        }
        else if($tip_unitate == 2){
          echo "Înregistrează Restaurant";
        }
        else if($tip_unitate == 3){
          echo "Înregistrează Cafenea";
        }
        else {
          echo "Înregistrează Unitate";
        }
      ?>
    </h2><br>
  </div>

<div class="row featurette">
  <div class="col-md-12">
    <main class="form-signin w-100 m-auto">
      <form method='post'>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="nume" value="<?php echo $nume;?>" placeholder="nume" required>
          <label for="floatingInput">Numele Unității</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="descriere" value="<?php echo $descriere;?>" placeholder="descriere" required>
          <label for="floatingInput">Descrierea Unității</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="adresa" value="<?php echo $adresa;?>" placeholder="adresa" required>
          <label for="floatingInput">Adresa</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="telefon" value="<?php echo $telefon;?>" placeholder="adresa" required>
          <label for="floatingInput">Număr de contact</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="floatingInput" name="email" value="<?php echo $email;?>" placeholder="name@example.com" required>
          <label for="floatingInput">Adresă de e-mail</label>
        </div>
        <?php include('./errors.php'); ?>
        <font color="red" size="2px"> ATENTIE! Toate câmpurile sunt obligatorii!</font><br>
        <br><button class="w-100 btn btn-lg btn-success" type="submit" name="inregistrareUnitateBtn">Next</button>
      </form>
    </main>
  </div>
</div>
<!--
<hr class="featurette-divider">

<div class="row featurette">
  <div class="col-md-6">
    <h2 class="featurette-heading">Criterii prestabilite.</h2>
    <p class="lead">Criteriile prestabilite sunt acele criterii pentru care orice Unitate înregistrată va fi evaluată de către clienți pentru a ajuta la o filtrare mai eficientă.</p>
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

<div class="row featurette">
  <div class="col-md-6">

    <main class="form-add">
      <form  method='post'>
        <div class="input-group">
          <input type="text" class="form-control w-auto m-auto" name="task" placeholder="Adaugă criterii noi" required>
          <button class="btn btn-primary w-auto m-20 " type="submit" name="addTaskBtn">Adaugă</button></div>
      </form>
    </main>

    <table class="table table-striped">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col" class="t">Criterii</th>
        <th scope="col"></th>
      </tr>
      </thead>
    
      <tbody>
        <tr>
          <?php
            $tasks = mysqli_query($db, "SELECT * FROM Criterii_review");
            $i = 1; 
            while ($row = mysqli_fetch_array($tasks)) { 
          ?>
          <form action="inregistrare_unitate.php?del_task=<?php echo $row['id']?>" method='post'>
             <td><?php echo $i;?></td>
             <td class="t"><?php echo $row['nume_Criteriu'];?></td>
             <td class="b"><button type="submit" class="btn" name="deleteTaskBtn" style="--bs-btn-padding-y: 0; --bs-btn-padding-x: 0;">
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="red" class="bi bi-trash3" viewBox="0 0 16 16">
              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
              </svg></button></td>
          </form>
        </tr>
        <?php $i++; } ?>
      </tbody>
		</table><br><br>
  </div>
  <div class="col-md-6">
    <h2 class="featurette-heading">Criterii opționale.</h2>
    <p class="lead">Criteriile opționale pentru review vor fi adăugate în funcție de fiecare Unitate care se dorește a fi evaluată, pe baza facilităților de care asteasta dispune. </p><br><br>
  </div>
</div><br>
<button class="w-100 btn btn-lg btn-primary" type="submit" name="Inregistreaza">Înregistrare</button> -->
</center> 
</body>
</html>		
