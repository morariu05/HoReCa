 <?php
	session_start();

	$server = 'localhost';
	$user = '2022.morariu.mihaela-madalina';
	$pass = 'Qwerty123';
	$dbs = '2022.morariu.mihaela-madalina';
	$errors = array(); 

// connect to the database
	$db = mysqli_connect($server, $user, $pass, $dbs);

// REGISTER USER
	if (isset($_POST['registerBtn'])) {
	  // se iau datele introduse in form la apasarea butonului 
		$first_name = mysqli_real_escape_string($db, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($db, $_POST['last_name']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$phone = mysqli_real_escape_string($db, $_POST['phone']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

	  // verificare daca email-ul exista deja
		$email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
		$result = mysqli_query($db, $email_check_query);
		$email_OK = mysqli_fetch_assoc($result);
	  
	  //filtrare nume/prenume
		if($first_name){
			if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
				array_push($errors, "In campul NUME, numai literele si spatiile albe sunt permise!");
			}
		} 
		if($last_name){	
			if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
				array_push($errors, "In campul PRENUME, numai literele si spatiile albe sunt permise!");
			}
		}
		
		if ($email_OK) { 
			if ($email_OK['email'] === $email) {
			  array_push($errors, "email-ul introdus deja exista!");
			}
		}
	  
	  // daca nu sunt erori in form, se face logarea
		if (count($errors) == 0) {
			$query = "INSERT INTO users (first_name, last_name, address, phone, email, password) 
					  VALUES('$first_name', '$last_name', '$address', '$phone', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "Autentificat cu succes!";
			header('location:home.php');
		}
	}


// LOGIN USER
	if (isset($_POST['loginBtn'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
			  $_SESSION['email'] = $email;
			  $_SESSION['success'] = "Autentificat cu succes!";
			  header('location:home.php');
			}else {
				array_push($errors, "Email sau parola gresite!");
			}
		}
	}
	
	
// TASK
	if (isset($_POST['addTaskBtn'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todo (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: home.php');
		}
	}	
	
?>