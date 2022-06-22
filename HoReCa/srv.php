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
					  VALUES('$first_name', '$last_name', '$email', '$username', '$password')";
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

		if (count($errors) == 0) {
			$query = "SELECT * FROM Administrator_Unitate WHERE (email='$email' OR username='$email') AND parola='$password'";
			$user = mysqli_query($db, $query);
			$user_id = mysqli_fetch_assoc($user);
			
			if ($user_id) {
			  $_SESSION['email'] = $email;
			  $_SESSION['id'] = $user_id['id_Administrator'];
			  $_SESSION['autentificare'] = true;
			  header("location:http://localhost/HoReCa/proiect%20final/home.php");
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

	if($parolaNoua == $confirmaParolaNoua){
		mysqli_query($db, "UPDATE Administrator_Unitate SET parola='$parolaNoua' WHERE id_Administrator='$id';");
	}
	else{
		echo 'EROARE! Parolele nu sunt identice!';
	}
}

// CONFIRMARE REVIEW
/*
if(isset($_POST['trimitere_review_Btn'])){
    header("location:http://localhost/HoReCa/proiect%20final/user/confirmare_review.php");
    exit();
}
*/

?>