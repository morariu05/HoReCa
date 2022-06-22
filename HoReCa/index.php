<?php
	include ('srv.php');
?>
<html lang="ro">
<head> 
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
	<title>HoReCa Reviews</title>
	<link href="./css/prezentare.css" rel="stylesheet">
	<link href="./css/animate.min.css" rel="stylesheet">
    <style>
        a{
            text-decoration: none; 
        }
        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
        }
        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
        }
        .featurette-heading {
            font-weight: 250;
            line-height: 1;
            letter-spacing: -.05rem;
            padding-top: 0%;
        }
        .featurette-heading {
            font-size: 50px;
        }
        img {
            max-width: 10%;
            height: auto;
        }
    </style>
</head>
<body style="padding: 0;">
    <div>
        <!-- -------------------------------------------------------------------------------------------------- -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="index.php" class="navbar-brand p-0">
                    <h1 class="m-0">HoReCa Reviews</h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="#" class="nav-item nav-link"></a>
                    </div>
                    <a href="start_page.php" class="btn btn-outline-light rounded-pill text-warning py-2 px-4 ms-lg-5">Înregistrează-ți Unitatea</a>
                </div>
            </nav>

			<div class="container-xxl bg-dark hero-header">
				<div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-7 text-center text-lg-start">
                            <h1 class="featurette-heading text-warning mb-5 animated zoomIn">Părerea ta contează!</h1>
                            <p class="lead text-warning pb-3 animated zoomIn">Lasă un review hotelurilor, restaurantelor sau cafenelelor pe care le-ai vizitat pentru a ajuta la îmbunătățirea calității serviciilor de care acestea dispun.</p>
                            <a href="./user/toate_unitatile.php" class="btn btn-outline-warning rounded-pill border-2 py-3 px-5 animated slideInRight">Lasă un review</a>
                        </div>
                    </div>
			    </div>
			</div>
        </div><br><br>
        <!-- -------------------------------------------------------------------------------------------------- -->

        <div class="container-xxl">
            <div class="container">
                <div class="row g-5">
                    <h2 class="mb-4">Căutați după tipul unității</h2>
                    <div class="col-lg-4">
                        <a href="./user/unitati.php?tip_unitate=1">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('./images/hotel.jpg'); background-size: 103%; background-position: center;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Hoteluri</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="./user/unitati.php?tip_unitate=2">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('./images/restaurant.jpg'); background-size: 100%; background-position: 0 70%;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Restaurante</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="./user/unitati.php?tip_unitate=3">
                            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-4 shadow-lg" style="background-image: url('./images/cafenea.jpg'); background-size: 100%; background-position: 0 7%;">
                                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Cafenele</h2>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>

        <div class="container-xxl py-4 px-4 comm">
            <div id="carouselExampleCaptions" class="carousel slide carousel-multi-item" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                        <h2 class="mb-5">Părerea Clienților Noștri</h2>
                    </div><br>
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>Camera curata, terasa mare, mic dejun gustos și diversificat, personalul foarte amabil și zâmbitor.</p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Maria</h6>
                                        <small>2021-05-11</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>Promptitudinea raspunsului la doleanțele noastre. Personal amabil. Curatenia!</p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Marius</h6>
                                        <small>2021-12-30</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>O surpriza foarte placuta acest hotel. Camere curate si moderne, personal foarte amabil, parcare privata spatioasa si supravegheata video. Voi reveni cu siguranta!</p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Catinca</h6>
                                        <small>2022-03-03</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>Locație și atmosferă excelentă! Cafeaua este cea mai bună din oraș! La fel și raportul preț/calitate. </p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Mara</h6>
                                        <small>2022-06-12</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>Camerele, piscina, ospitalitatea, ca niciodată nu avem surprize neplăcute.</p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Cătălin</h6>
                                        <small>2022-02-01</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <i class="fa fa-quote-left fa-2x text-warning mb-3"></i>
                                <p>Mâncare bună, camere foarte mari, curățenie fără nimic de reproșat, personalul foarte amabil. Piscina cu apă încalzită, nu foarte mare dar ok pentru o balaceală de relaxare./p>
                                <div class="d-flex align-items-center">
                                    <img src="./images/users.png">
                                    <div class="ps-3">
                                        <h6 class="mb-1">Simona</h6>
                                        <small>2021-11-20</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br><br><br>

        <!-- Footer -------------------------------------------------------------------------------------------------- -->
        <div class="container-fluid bg-dark text-light footer pt-3">
            <div class="container py-2">
                <div class="row g-4">
                    <div class="col-md-4 col-lg-5">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Avram, Târgu Mureș, România</p>
                        <p><i class="fa fa-phone-alt me-3"></i>+4072 345 678</p>
                        <p><i class="fa fa-envelope me-3"></i>horeca@reviews.com</p>
                    </div>
                    <div class="col-md-4 col-lg-4">
                        <h5 class="text-white mb-4">Administrare Unități</h5>
                        <a class="btn btn-link" href="start_page.php">Start</a>
                        <a class="btn btn-link" href="register_page.php">Creare cont</a>
                        <a class="btn btn-link" href="login_page.php">Autentificare</a>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <h5 class="text-white mb-4">Rețele de socializare</h5>
                        <p>Acum ne puteți găsi chiar și pe aceste rețele sociale</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">HoReCa Reviews</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- -------------------------------------------------------------------------------------------------- -->
    </div>
</body>
</html>		
