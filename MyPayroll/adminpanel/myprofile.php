<?php
include ('./php/config.php');
session_start();


?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, 
                   initial-scale=1.0">
                   <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="../adminpanel/adminpanel.css">
    <link rel="stylesheet" href="css/style.css" >
    <link rel="stylesheet" href="myprofile.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="../adminpanel/adminpanel.css">
    <link rel="stylesheet" href="css/style.css" >
</head>
 
<body>
  <!-- nav bar --> 
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
    <!-- offcanvas trigger-->
    <button 
    class="navbar-toggler me-3 my-lg-0"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#sidebar"
    aria-controls="offcanvasExample">
    <span 
    class="navbar-toggler-icon"
    data-bs-target="#sidebar"></span>
</button>
    <!--offcanvas trigger-->
    <a class="navbar-brand me-auto ms-lg-0 ms-3" style="height: 40PX;"href="adminpanel.php">
        <div class="logo-frame">
            <div class="logo-text-frame">
                <div class="logo-text">MyPayroll </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                    <path d="M20.5 7V13C20.5 14.3261 19.9732 15.5979 19.0355 16.5355C18.0979 17.4732 16.8261 18 15.5 18L9.5 18C8.17392 18 6.90215 17.4732 5.96447 16.5355C5.02678 15.5979 4.5 14.3261 4.5 13L4.5 7L20.5 7Z" stroke="#0404AA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                   </svg>
                 </div>
         </div></a>
    <button 
    class="navbar-toggler" 
    type="button" 
    data-bs-toggle="collapse" 
    data-bs-target="#topNavBar" 
    aria-controls="topNavBar" 
    aria-expanded="false" 
    aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
  
      <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item dropdown">
        <a 
        class="nav-link dropdown-toggle ms-2" 
        href="#" role="button" 
        data-bs-toggle="dropdown" 
        aria-expanded="false">
            <i class="bi bi-person"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="myprofile.php">Profilul meu</a></li>
          <li><a class="dropdown-item" href="../php/logout.php">Log out</a></li>
        </ul>
      </li>
    </ul>
    </div>
    </div>
  </nav>
  <!-- nav bar-->
  <!-- offcanvas-->
  
  
  <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar" >
    
    <div class="offcanvas-body p-0">
      <nav class="navbar-light">
        <ul class="navbar-nav" >
            
                <li>
                 <div class="text-muted small fw-bold text-uppercase px-3">
                        Principal
                 </div>   
                </li>
                <li>
                    <a href="adminpanel.php" class="nav-link px-3 active">
                        <span>
                            <i class="bi bi-speedometer2">

                            </i>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="my-4">
                    <hr class="dropdown-divider">

                </li>
                <li>
                    <div class="text-muted small fw-bold text-uppercase px-3">
                        INTERFAȚA
                 </div> 
                </li>
                <li>
                    <a 
                    class="nav-link px-3 sidebar-link"
                    data-bs-toggle="collapse"
                    href="#tabele"
                   >
                   <span class="me-2"><i class="bi bi-layout-split"></i></span>
                    <span>Tabele</span>
                    <span class="ms-auto">
                        <span class="right-icon">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </span>
            </a>
            <div class="collapse" id="tabele">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="salariati.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Salariați</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="tabele">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="utilizatori.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Utilizatori</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="collapse" id="tabele">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="pontaj.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-table"></i
                      ></span>
                      <span>Pontaj</span>
                    </a>
                  </li>
                </ul>
              </div>
                </li>
                
                <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="statistici.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Statistici</span>
              </a>
            </li>
            
        </ul>
      </nav>
    </div>
  </div>
  
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
        <div class="col-xl-6 col-md-12">
                                                        <div class="card user-card-full">
                                                            <div class="row m-l-0 m-r-0">
                                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                                    <div class="card-block text-center text-white">
                                                                        <div class="m-b-25">
                                                                            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                                                        </div>
                                                                        <div class="f-w-600" style="color: #0404AA; font-weight:700;">
                                                                          <?php 
                                                                            if (isset($_SESSION['id'])) {
                                                                                $id=$_SESSION['id'];
                                                                                $nume = "SELECT salariat FROM salariati where id_salariat=$id";
                                                                                $resultf = $con->query($nume);
                                                                                if ($resultf->num_rows > 0) {
                                                                                // Afișează datele pentru fiecare rând
                                                                                    while($rowf = $resultf->fetch_assoc()) {
                                                                                    echo $rowf["salariat"]  ;
                                                                                    }
                                                                                } else {
                                                                                echo "Nicio funcție găsită";
                                                                                }
                                                                            }
                                                                            ?></div>
                                                                        <p style="color: #00000; font-weight:500;"><?php 
                                                                            if (isset($_SESSION['id'])) {
                                                                                $id=$_SESSION['id'];
                                                                                $functia = "SELECT Functia FROM salariati where id_salariat=$id";
                                                                                $resultf = $con->query($functia);
                                                                                if ($resultf->num_rows > 0) {
                                                                                // Afișează datele pentru fiecare rând
                                                                                    while($rowf = $resultf->fetch_assoc()) {
                                                                                    echo $rowf["Functia"]  ;
                                                                                    }
                                                                                } else {
                                                                                echo "Nicio funcție găsită";
                                                                                }
                                                                            }
                                                                            ?></p>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="card-block">
                                                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informații</h6>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-10 f-w-600">Email</p>
                                                                                <h6 class="text-muted f-w-400"><?php 
                                                                                    if (isset($_SESSION['id'])) {
                                                                                        $id=$_SESSION['id'];
                                                                                        $email = "SELECT email FROM salariati where id_salariat=$id";
                                                                                        $resultf = $con->query($email);
                                                                                        if ($resultf->num_rows > 0) {
                                                                                        // Afișează datele pentru fiecare rând
                                                                                            while($rowf = $resultf->fetch_assoc()) {
                                                                                            echo $rowf["email"]  ;
                                                                                            }
                                                                                        } else {
                                                                                        echo "Nicio funcție găsită";
                                                                                        }
                                                                                    }
                                                                                    ?></h6>
                                                                                     <p class="m-b-10 f-w-600">Telefon</p>
                                                                                <h6 class="text-muted f-w-400">+<?php 
                                                                                    if (isset($_SESSION['id'])) {
                                                                                        $id=$_SESSION['id'];
                                                                                        $telefon = "SELECT telefon FROM salariati where id_salariat=$id";
                                                                                        $resultf = $con->query($telefon);
                                                                                        if ($resultf->num_rows > 0) {
                                                                                        // Afișează datele pentru fiecare rând
                                                                                            while($rowf = $resultf->fetch_assoc()) {
                                                                                            echo $rowf["telefon"]  ;
                                                                                            }
                                                                                        } else {
                                                                                        echo "Nicio funcție găsită";
                                                                                        }
                                                                                    }
                                                                                    ?></h6>
                                                                            </div>
                                                                          
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                        </div>
                                                    </div>
    </div> 
</body>
</html>