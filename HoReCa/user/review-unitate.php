<?php
	include ('../srv.php');
?>
<html>
<head> 
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Review Unitate</title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">
  <link href="../css/carousel.css" rel="stylesheet">
  <style> 
    body  {
      margin: 0; 
      padding: 0;
    }
	  .table {
      max-width: 700px;
      text-align: left;
    }
    .table p{
      margin-top: 0;
      margin-bottom: 1px;
    }
    td.range {
        width: 90px;
    }
    td.range2{
        max-width: 100px;
    }
    .comment{
        margin-top: 60px;
    }
    .name{
        max-width: 800px;
        margin-left: 300px;
    }
    button {
        width: 300px;
    }
    input {
      margin: 5px 0;
    }
    img {
    max-width: 30%;
    height: auto;
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
            <a href="../start_page.php" class="btn rounded-pill text-warning py-2 px-4 ms-lg-5">Înregistrează-ți Unitatea</a>
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
            $query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_UnitateHoReCa = '$unit' ");
            $unitate = mysqli_fetch_assoc($query);
            if(mysqli_num_rows($query) == 0){
                header("location:http://localhost/HoReCa/proiect%20final/home.php");
            }
            ?>
                <div class="col-lg-5">
                    <?php
                        if($unitate['id_TipUnitate'] == 1){
                            echo '<img src="../images/hotel.png">';
                        }
                        else if($unitate['id_TipUnitate'] == 2){
                            echo '<img src="../images/restaurant.png">';
                        }
                        else{
                            echo '<img src="../images/coffee-shop.png">';
                        }
                    ?>
                    <h2 class="fw-normal"><?php echo $unitate['nume']; ?></h2>
                    <p><?php echo $unitate['descriere']; ?></p>
                    <p><?php echo $unitate['adresa']; ?></p>
                    <p><?php echo $unitate['telefon']; ?></p>
                </div> 
                
                <hr class="featurette-divider">
                <form method="post">
                    <div class="row featurette">
                    <form method="post">
                        <div class="col-md-5">
                            <h2 class="f-heading">Criterii prestabilite</h2><br>
                            <p class="lead">Criteriile prestabilite pentru review sunt criteriile obligatorii pentru care orice Unitate HoReCa va trebui a fi evaluată cu o notă de la 1 la 10.</p>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                    <?php
                                        $tasks = mysqli_query($db, "SELECT Tip_Review.numeTipReview, Tip_Review_Tip_Unitate.id_TipReview FROM Tip_Review INNER JOIN Tip_Review_Tip_Unitate ON Tip_Review.id_TipReview = Tip_Review_Tip_Unitate.id_TipReview AND Tip_Review_Tip_Unitate.id_TipUnitate = $unitate[id_TipUnitate]");
                                        $i = 1; 
                                        while ($row = mysqli_fetch_array($tasks)) { 
                                    ?>
                                    <td></td>
                                    <td class="range"><p><?php echo $row['numeTipReview'];?></p></td>
                                    <td><input type="range" class="form-range" name="<?php echo 'x_'.$row['id_TipReview'];?>" value="1" min="1" max="10" id="customRange2" oninput="this.nextElementSibling.value = this.value"><output>1</output></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table><br>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row featurette">  
                        <div class="col-md-5">
                            <h2 class="f-heading">Criterii opționale</h2><br>
                            <p class="lead">Criteriile opționale pentru review specifice acestei Unități HoReCa pot fi evaluate (sau nu) cu o notă de la 0(zero) la 10, în funcție de preferințele dumneavoastră. </p>
                        </div>
                        <div class="col-md-7">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                    <?php
                                        $tasks = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Unitate ON Facilități.id_Facilitate = Facilități_Unitate.id_Facilitate AND Facilități_Unitate.id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");
                                        $i = 1; 
                                        if(mysqli_num_rows($tasks) == 0){
                                            echo '<p class="lead"> Nu există criterii opționale adăugate pentru această Unitate HoReCa. </p>'; 
                                        }
                                        while ($row = mysqli_fetch_array($tasks)) { 
                                    ?>
                                    <td></td>
                                    <td class="range2"><p><?php echo $row['nume_Facilitate'];?></p></td>
                                    <td><input type="range" class="form-range" name="<?php echo 'y_'.$row['id_Facilitate'];?>" value="0" min="0" max="10" id="customRange2" oninput="this.nextElementSibling.value = this.value"><output>0</output></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table><br>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row featurette">  
                        <div class="col-md-6">
                        <h2 class="f-heading">Impresii generale</h2><br>
                            <p class="lead">Opțional aveți opțiunea de a vă lăsa părerea personală legată de experiența avută, facilitățile puse la dispoziție sau despre atmosfera din cadrul acestei unități.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea class="form-control comment" placeholder="" id="textBox_comentariu" name="textBox_comentariu" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" value="" name="textBox_email" placeholder="name@example.com" required>
                            <label for="floatingInput">e-mail</label>
                        </div>      
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" value="" name="textBox_nume" placeholder="name" required>
                            <label for="floatingInput">nume</label>
                        </div>        
                    </div><br>
                    <button type="submit" class="btn btn-dark text-warning" name="trimitere_review_Btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Trimite review</button><br>
                </form><br>
            <hr>
        </center>
    </div>
</div>

</center>  
</body>
</html>

