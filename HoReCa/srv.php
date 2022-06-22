 <?php
	session_start();

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$server = 'localhost';
	$user = 'root';
	$pass = '';
	$dbs = 'HoReCa';
	$errors = array(); 

// conectare la baza de date
	$db = mysqli_connect($server, $user, $pass, $dbs);

// REGISTER USER
	if (isset($_POST['registerBtn'])) {
	  // se iau datele introduse in form la apasarea butonului 
		$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

	  // verificare daca email-ul exista deja
		$email_check_query = "SELECT * FROM Administrator_Unitate WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db, $email_check_query);
		$email_OK = mysqli_fetch_assoc($result);

	  // verificare daca username-ul exista deja
		$username_check_query = "SELECT * FROM Administrator_Unitate WHERE username='$username' LIMIT 1";
		$result = mysqli_query($db, $username_check_query);
		$username_OK = mysqli_fetch_assoc($result);
	  
	  //filtrare nume/prenume
		if($first_name){
			if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
				array_push($errors, "În câmpul NUME, numai literele și spațiile albe sunt permise!");
			}
		} 
		if($last_name){	
			if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
				array_push($errors, "În câmpul PRENUME, numai literele și spațiile albe sunt permise!");
			}
		}
		
		if ($email_OK) { 
			if ($email_OK['email'] === $email) {
			  array_push($errors, "email-ul introdus deja există!");
			}
		}

		if ($username_OK) { 
			if ($username_OK['username'] === $username) {
			  array_push($errors, "username-ul introdus deja exista!");
			}
		}
	  
	  // daca nu sunt erori in form, se face logarea
		if (count($errors) == 0) {
			$query = "INSERT INTO Administrator_Unitate (nume, prenume, email, username, parola) 
					  VALUES('$first_name', '$last_name', '$email', '$username', '$hashed_password')";
			mysqli_query($db, $query);
			$_SESSION['email'] = $email;
			$_SESSION['autentificare'] = true;
			header('location:login_page.php');
		}
	}

// LOGIN USER
	if (isset($_POST['loginBtn'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);

		if (count($errors) == 0) {
			$query = "SELECT * FROM Administrator_Unitate WHERE (email='$email' OR username='$email')";
			$user = mysqli_query($db, $query);
			$user_id = mysqli_fetch_assoc($user);
			
			if ($user_id) {
				if(password_verify($password, $user_id['parola'])) {
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $user_id['id_Administrator'];
					$_SESSION['autentificare'] = true;
					header("location:http://localhost/HoReCa/proiect%20final/home.php");
				}
			}else {
				array_push($errors, "email-ul/username-ul sau parola sunt incorecte!");
			}
		}
	}

// INREGISTRARE UNITATE
	if (isset($_POST['inregistrareUnitateBtn'])) {
		// se iau datele introduse in form la apasarea butonului 
		$nume = mysqli_real_escape_string($db, $_POST['nume']);
		$descriere = mysqli_real_escape_string($db, $_POST['descriere']);
		$adresa = mysqli_real_escape_string($db, $_POST['adresa']);
		$telefon = mysqli_real_escape_string($db, $_POST['telefon']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		
		// verificare daca numele exista deja
		$name_check_query = "SELECT * FROM Unitate_HoReCa WHERE nume='$nume' LIMIT 1";
		$result = mysqli_query($db, $name_check_query);
		$nume_OK = mysqli_fetch_assoc($result);

		if ($nume_OK) { 
			if ($nume_OK['nume'] === $nume) {
			  array_push($errors, "numele introdus deja există!");
			}
		}
		if($telefon){
			if (!preg_match("/^[0-9]*$/", $telefon)) {
				array_push($errors, "În câmpul TELEFON, numai cifrele sunt permise!");
			}
		}

		// daca nu sunt erori in form, se face inregistrarea
		if (count($errors) == 0) {
			$tip_unitate = $_SESSION['tip_unitate'];
			$user_id = $_SESSION['id'];
			$query = "INSERT INTO Unitate_HoReCa (nume, descriere, adresa, telefon, email, cod_QR, id_Administrator, id_TipUnitate) 
						VALUES('$nume', '$descriere', '$adresa', '$telefon', '$email', '1', '$user_id', '$tip_unitate' )";
			mysqli_query($db, $query);
			$sql = "SELECT * FROM Unitate_HoReCa WHERE nume='$nume' AND id_Administrator='$user_id' AND id_TipUnitate='$tip_unitate'";
			$result = mysqli_query($db, $sql);
			$id_unitate = mysqli_fetch_assoc($result);
			$id_unitate = $id_unitate['id_UnitateHoReCa'];

			// adaugam la unitate link pentru QR API
			$QR_data = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost/HoReCa/proiect%20final/unitate.php?id_UnitateHoReCa=$id_unitate";
			
			mysqli_query($db, "UPDATE Unitate_HoReCa SET cod_QR='$QR_data' WHERE id_UnitateHoReCa='$id_unitate'");

			$_SESSION['id_Unitate'] = $id_unitate;
			header("location:http://localhost/HoReCa/proiect%20final/criterii_review.php?tip_unitate=$tip_unitate");
		}
	}

// CRITERII
	if(isset($_POST['Inregistreaza'])){

		if(!empty($_POST['criteriu'])) {
			$unitate_id = $_SESSION['id_Unitate'];
			foreach($_POST['criteriu'] as $value){
				$query = "INSERT INTO Facilități_Unitate (id_UnitateHoReCa, id_Facilitate) 
							VALUES('$unitate_id', '$value')";
				mysqli_query($db, $query);
			}
		}
	}

// STERGERE UNITATE

if (isset($_GET['delete_UnitateHoReCa'])) {
	$id = $_GET['delete_UnitateHoReCa'];
			
	mysqli_query($db, "DELETE FROM Unitate_HoReCa WHERE id_UnitateHoReCa=$id");
	header("location:http://localhost/HoReCa/proiect%20final/home.php");
}

// EDITARE UNITATE

if (isset($_POST['editare_unitate'])) {
	$nume = mysqli_real_escape_string($db, $_POST['nume']);
	$descriere = mysqli_real_escape_string($db, $_POST['descriere']);
	$adresa = mysqli_real_escape_string($db, $_POST['adresa']);
	$telefon = mysqli_real_escape_string($db, $_POST['telefon']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$id = $_GET['id_UnitateHoReCa'];
	
	mysqli_query($db, "UPDATE Unitate_HoReCa SET nume='$nume', descriere='$descriere', adresa='$adresa', telefon='$telefon', email='$email' WHERE id_UnitateHoReCa='$id';");
}

// EDITARE USER

if (isset($_POST['editare_unitate'])) {
	$nume = mysqli_real_escape_string($db, $_POST['nume']);
	$prenume = mysqli_real_escape_string($db, $_POST['prenume']);
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$id = $_SESSION['id'];
	
	mysqli_query($db, "UPDATE Administrator_Unitate SET nume='$nume', prenume='$prenume', username='$username', email='$email' WHERE id_Administrator='$id';");
}

// SCHIMBARE PAROLA

if (isset($_POST['schimba_parola'])) {
	$parola = mysqli_real_escape_string($db, $_POST['parola']);
	$parolaNoua = mysqli_real_escape_string($db, $_POST['parolaNoua']);
	$confirmaParolaNoua = mysqli_real_escape_string($db, $_POST['confirmaParolaNoua']);
	$id = $_SESSION['id'];

	$query_passwd = mysqli_query($db, "SELECT * FROM Administrator_Unitate WHERE id_Administrator = '$id';");
	$passwd = mysqli_fetch_array($query_passwd);
	
	$hash_parolaNoua = password_hash($parolaNoua, PASSWORD_DEFAULT);
	if($parolaNoua == $confirmaParolaNoua){
		if(password_verify($parola, $passwd['parola'])) {
			mysqli_query($db, "UPDATE Administrator_Unitate SET parola='$hash_parolaNoua' WHERE id_Administrator = '$id';");
		}
	}
	else{
		echo 'EROARE! Parolele nu sunt identice!';
	}
}

// CONFIRMARE REVIEW
if(isset($_POST['trimitere_review_Btn'])){

	$id = $_SESSION['id'];
    $unit = $_GET['id_UnitateHoReCa'];
	$query = mysqli_query($db, "SELECT * FROM Unitate_HoReCa WHERE id_UnitateHoReCa = '$unit' ");
    $unitate = mysqli_fetch_assoc($query);

	$nume = mysqli_real_escape_string($db, $_POST['textBox_nume']);
	$email = mysqli_real_escape_string($db, $_POST['textBox_email']);
    $comentariu = mysqli_real_escape_string($db, $_POST['textBox_comentariu']);

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

    // 1) Reviewer
    /* 
        ID_Reviewer
        email
        nume
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
    /* 
       @ PK : ID_Review
       @ FK/AK1.1: ID_UnitateHoReCa  = unit
       @ FK: ID_Reviewer             = reviewerul creat precedent
       @ Valoare_Review              = media tuturor crit. cu val !0
       @ AK1.2: Data                 = now
       @ Impresii generale           = textbox
    
    - inseram date review
    - id_review = SELECT id WHERE id_reviewer & data
    */

    $data_actuala = date("Y-m-d");
    mysqli_query($db, "INSERT INTO Review (id_UnitateHoReCa, id_Reviewer, valoare_review, impresii_generale, data_actuala) VALUES ('$unit', '$id_reviewer', '$valoare_review', '$comentariu', '$data_actuala')"); 
    $id_review = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM Review WHERE id_UnitateHoReCa='$unit' AND id_Reviewer='$id_reviewer' AND data_actuala='$data_actuala';"));
    $id_review = $id_review['id_Review'];

    // 3) Review_Obligatoriu
    /*
    ---> pentru fiecare crit. obligatoriu id-ul sau se va insera in Review_Obligatoiru

        @ FK: ID_Review       = reviewul creat precedent
        @ FK: ID_TipReview    = id tip review
        @ Valoare_Tip_Review  = valoarea criteriilor obligatorii
    */

    $criterii_obligatorii = mysqli_query($db, "SELECT Tip_Review.numeTipReview, Tip_Review_Tip_Unitate.id_TipReview FROM Tip_Review INNER JOIN Tip_Review_Tip_Unitate ON Tip_Review.id_TipReview = Tip_Review_Tip_Unitate.id_TipReview AND Tip_Review_Tip_Unitate.id_TipUnitate = $unitate[id_TipUnitate];");

    while ($row = mysqli_fetch_array($criterii_obligatorii)) {
        $id_tipReview = $row['id_TipReview'];
        $valoare = mysqli_real_escape_string($db, $_POST['x_'.$row['id_TipReview']]);

        mysqli_query($db, "INSERT INTO Review_Obligatoriu (id_Review, id_TipReview, valoare_tip_review) VALUES ('$id_review', '$id_tipReview', '$valoare')");
    }

     // 4) Review_Facilitati
     /*
     ---> pentru fiecare crit. optional id-ul sau se va insera in Review_Facilitati
        FK: ID Review
        FK: ID Facilitate
        Valoare_Review_Facilitate
     */

    $criterii_optionale = mysqli_query($db, "SELECT Facilități.nume_Facilitate, Facilități_Unitate.id_Facilitate FROM Facilități INNER JOIN Facilități_Unitate ON Facilități.id_Facilitate = Facilități_Unitate.id_Facilitate AND Facilități_Unitate.id_UnitateHoReCa = $unitate[id_UnitateHoReCa]");
    
    while ($row = mysqli_fetch_array($criterii_optionale)) { 
        $id_facilitate = $row['id_Facilitate'];
        $valoare = mysqli_real_escape_string($db, $_POST['y_'.$row['id_Facilitate']]);
    
        mysqli_query($db, "INSERT INTO Review_Facilități (id_Review, id_Facilitate, valoare_review_facilitate) VALUES ('$id_review', '$id_facilitate', '$valoare')"); 
    }

    header("location:http://localhost/HoReCa/proiect%20final/user/confirmare_review.php?id_UnitateHoReCa=$unitate[id_UnitateHoReCa]&nume_reviewer=$nume&comentariu=$comentariu&total=$valoare_review");
}
?>