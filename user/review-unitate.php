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
  </style>
</head>
<body>
<!-- ---------------------------------------------------------------------------------------------------- -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php" style="color: green">HoReCa Reviews</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="register_page.php" class="nav-item nav-link" disabled></a>
            </div>
            <a href="../start_page.php" class="btn rounded-pill text-success py-2 px-4 ms-lg-5">Înregistrează-ți Unitatea</a>
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
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg><br>

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
                                <textarea class="form-control comment" placeholder="ana are mere si pere si fructe de toate felurile." id="textBox_comentariu" name="textBox_comentariu" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="featurette-divider">
                    <div class="row featurette">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" value="a@gmail.com" name="textBox_email" placeholder="name@example.com" required>
                            <label for="floatingInput">e-mail</label>
                        </div>      
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" value="nume" name="textBox_nume" placeholder="name" required>
                            <label for="floatingInput">nume</label>
                        </div>        
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="trimitere_review_Btn">Trimite review</button><br>
                </form>
            <hr>
        </center>
    </div>
</div>

</center>  
</body>
</html>

<?php

if(isset($_POST['trimitere_review_Btn'])){
	$nume = mysqli_real_escape_string($db, $_POST['textBox_nume']);
	$email = mysqli_real_escape_string($db, $_POST['textBox_email']);
    $comentariu = mysqli_real_escape_string($db, $_POST['textBox_comentariu']);

    
    // $tip_unitate =
    $criterii_obligatorii = mysqli_query($db, "SELECT Tip_Review.numeTipReview, Tip_Review_Tip_Unitate.id_TipReview FROM Tip_Review INNER JOIN Tip_Review_Tip_Unitate ON Tip_Review.id_TipReview = Tip_Review_Tip_Unitate.id_TipReview AND Tip_Review_Tip_Unitate.id_TipUnitate = $unitate[id_TipUnitate];");
    $criterii_optionale = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Unitate ON Facilități.id_Facilitate = Facilități_Unitate.id_Facilitate AND Facilități_Unitate.id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");

    
    $total_nota = 0;
    $n = 0;

    // Criterii obligatorii
    while ($row = mysqli_fetch_array($criterii_obligatorii)) { 
       // echo "Id_TipReview ".$row['id_TipReview']." ";
        //echo "Val: ".mysqli_real_escape_string($db, $_POST['x_'.$row['id_TipReview']]);
        $valoare = mysqli_real_escape_string($db, $_POST['x_'.$row['id_TipReview']]);

            $total_nota = $total_nota + $valoare;
            $n++;
    }
   // echo "Valoare totala ".$total_nota;
	//echo "--------------------"."<br>";
    // Criterii optionale
    while ($row = mysqli_fetch_array($criterii_optionale)) { 
       // echo "Id_Facilitate ".$row['id_Facilitate']." ";
       // echo "Val: ".mysqli_real_escape_string($db, $_POST['y_'.$row['id_Facilitate']]);
        $valoare = mysqli_real_escape_string($db, $_POST['y_'.$row['id_Facilitate']]);

       // echo "<br>";
        if($valoare != 0){
            $total_nota = $total_nota + $valoare;
            $n++;
        }
    }
   // echo "Valoare totala ".$total_nota;

    
    $valoare_review = number_format((float) $total_nota/$n, 2, '.', '');
  //  echo "Valoare_review ".$valoare_review;

   /* echo "--------------------"."<br>";
	echo "Id_unitate ".$unit."<br>";
	echo "--------------------"."<br>";
    echo "nume ".$nume."<br>";
    echo "email ".$email."<br>";
    echo "comentariu".$comentariu."<br>"; */

    // 1( Reviewer)
       /* ID_Reviewer
        email
        nume*/
    /*
        - inseram reviewer
        - id_reviewer = SELECT
    */
    
    // se verifica daca exista deja un reviewer cu aceeasi combinatie de numa-email
    // daca exista, ii luam id-ul
    //daca nu exista, il creem, apoi ii luam id-ul
    $id_reviewer = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Reviewer WHERE nume='$nume' AND email='$email'"));
    if(!$id_reviewer['id_Reviewer']){
        mysqli_query($db, "INSERT INTO Reviewer (email, nume) VALUES ('$email', '$nume')"); 
        $id_reviewer = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Reviewer WHERE nume='$nume' AND email='$email'"));
    } 
    
    $id_reviewer = $id_reviewer['id_Reviewer'];
   // echo "id_reviewer ".$id_reviewer."<br>";


    // 2) tabela Review
    /* @ PK : ID_Review
       @  FK/AK1.1: ID_UnitateHoReCa = unit
       @ FK: ID_Reviewer             = reviewerul creat precedent
       @ Valoare_Review              = media tuturor crit. cu val !0
       @ AK1.2: Data                 = now
       @ Impresii generale           = textbox
    
    - inseram date review
    - id_review = SELECT id WHERE id_reviewer & data
       */

    $data_actuala = date("Y-m-d");
    //echo "Data ".$data_actuala."<br>";
    mysqli_query($db, "INSERT INTO Review (id_UnitateHoReCa, id_Reviewer, valoare_review, impresii_generale, data_actuala) VALUES ('$unit', '$id_reviewer', '$valoare_review', '$comentariu', '$data_actuala')"); 
    $id_review = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Review WHERE id_UnitateHoReCa='$unit' AND id_Reviewer='$id_reviewer' AND data_actuala='$data_actuala';"));
    $id_review = $id_review['id_Review'];
    //echo "id_review ".$id_review."<br>";

    // 3) ReviewObligatoriu
    /*
    pentru fiecare crit. obligatoriu idul sau
    se va insera in ReviewObligatoiru

        @ fK• ID Review       = reviewul creat precedent
        @ fK: ID TipReview    = id tip review
        @ Valoare Tip Review   = valoarea criteriilor obligatorii
     */

    $criterii_obligatorii = mysqli_query($db, "SELECT Tip_Review.numeTipReview, Tip_Review_Tip_Unitate.id_TipReview FROM Tip_Review INNER JOIN Tip_Review_Tip_Unitate ON Tip_Review.id_TipReview = Tip_Review_Tip_Unitate.id_TipReview AND Tip_Review_Tip_Unitate.id_TipUnitate = $unitate[id_TipUnitate];");

    while ($row = mysqli_fetch_array($criterii_obligatorii)) {
        $id_tipReview = $row['id_TipReview'];
        $valoare = mysqli_real_escape_string($db, $_POST['x_'.$row['id_TipReview']]);
       // echo "id_Tipreview ".$id_tipReview." ";
       // echo "valoare ".$valoare."<br>";
        mysqli_query($db, "INSERT INTO Review_Obligatoriu (id_Review, id_TipReview, valoare_tip_review) VALUES ('$id_review', '$id_tipReview', '$valoare')"); 

    }


     // 4) Review_Facilitati
     /*
     pentru fiecare crit. optional idul sau
     se va insera in Review_Facilitati
        FK• ID Review
        FK• ID Facilitate
        Valoare_Review_Facilitate
     */

    $criterii_optionale = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Unitate ON Facilități.id_Facilitate = Facilități_Unitate.id_Facilitate AND Facilități_Unitate.id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");

    while ($row = mysqli_fetch_array($criterii_optionale)) { 
        $id_facilitate = $row['id_Facilitate'];
        $valoare = mysqli_real_escape_string($db, $_POST['y_'.$row['id_Facilitate']]);
     //   echo "id_facilitate ".$id_facilitate." ";
      //  echo "valoare ".$valoare."<br>";
      //  echo "<br>";
        mysqli_query($db, "INSERT INTO Review_Facilități (id_Review, id_Facilitate, valoare_review_facilitate) VALUES ('$id_review', '$id_facilitate', '$valoare')"); 
    }
   
}
//header("location:http://localhost/HoReCa/proiect%20final/user/confirmare_review.php");

//    exit();



?>