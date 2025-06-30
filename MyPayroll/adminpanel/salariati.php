<?php 
session_start();
include('../php/config.php');

$sql = "SELECT * FROM salariati";
$result = $con->query($sql); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
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
          <li><a class="dropdown-item" href="logout.php">Log out</a></li>
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
  <!-- offcanvas-->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Salariați</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100" >
            <div class="card-body py-5">Număr salariați
              <?php 
              $querysal=('SELECT * FROM salariati');
              $querysal_run=mysqli_query($con,$querysal);
              if($total=mysqli_num_rows($querysal_run)){
                echo '<h4 class="mb-0"> '. $total .' </h4>';
              } else {
                echo '<h4 class="mb-0"> Nici un salariat </h4>';
              } ?>
            </div>
            <div class="card-footer d-flex">
              Vezi statistici
              <span class="ms-auto">
              <a href="statistici.php"><i class="bi bi-chevron-right" style="color: white;"></i></a>
              </span>
            </div>
          </div>
        </div>
       
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">Total salariu brut lunar
            <?php 
              $querysb = 'SELECT SUM(Salariu_brut) AS total_salariu_brut FROM salariati';
              $resultsb = mysqli_query($con, $querysb);
      
              if ($resultsb) {
                  $rowsb = mysqli_fetch_assoc($resultsb);
                  $totalsb = $rowsb['total_salariu_brut'];
      
                  echo '<h4 class="mb-0"> ' . $totalsb . ' RON</h4>';
              } else {
                  echo '<h4 class="mb-0"> Nici un salariu </h4>';
              }
          ?>
            </div>
            <div class="card-footer d-flex">
            Vezi statistici
              <span class="ms-auto">
              <a href="statistici.php"><i class="bi bi-chevron-right" style="color: white;"></i></a>
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-info text-dark h-100">
            <div class="card-body py-5">Total salariu net lunar
            <?php 
              $querysn = 'SELECT SUM(Salariu_net) AS total_salariu_net FROM salariati';
              $result1 = mysqli_query($con, $querysn);
      
              if ($result1) {
                  $row1 = mysqli_fetch_assoc($result1);
                  $totalsn = $row1['total_salariu_net'];
      
                  echo '<h4 class="mb-0"> ' . $totalsn . ' RON</h4>';
              } else {
                  echo '<h4 class="mb-0"> Nici un salariu </h4>';
              }
          ?>
            </div>
            <div class="card-footer d-flex">
            Vezi statistici
              <span class="ms-auto">
              <a href="statistici.php"><i class="bi bi-chevron-right" style="color: white;"></i></a>
              </span>
            </div>
          </div>
        </div>
     
      <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">Salariul brut mediu
            <?php 
              $queryavg = 'SELECT AVG(Salariu_brut) AS medie_salariu_brut FROM salariati';
              $resultavg = mysqli_query($con, $queryavg);
      
              if ($resultavg) {
                  $rowavg= mysqli_fetch_assoc($resultavg);
                  $totalavg = $rowavg['medie_salariu_brut'];
      
                  echo '<h4 class="mb-0"> ' . number_format($totalavg, 2) .  ' RON</h4>';
              } else {
                  echo '<h4 class="mb-0"> Nici un salariu </h4>';
              }
          ?>
            </div>
            <div class="card-footer d-flex">
            Vezi statistici
              <span class="ms-auto">
              <a href="statistici.php"><i class="bi bi-chevron-right" style="color: white;"></i></a>
              </span>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info'>" . htmlspecialchars($_GET['message']) . "</div>";
        }
        ?>
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span>Salariați
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                  id="example"
                  class="table table-striped data-table"
                  style="width: 100%"
                >
                  <thead>
                    <tr>
                      <th>Id</th>
                        <th>Salariat</th>
                        <th>Functia</th>
                        <th>Zile lucrate</th>
                        <th>Ore lucrate</th>
                        <th>Salariu brut</th>
                        <th>Concediu medical</th>
                        <th>CAS</th>
                        <th>CASS</th>
                        <th>Tichete de masă</th>
                        <th>Bază impozitabilă</th>
                        <th>Impozit pe venit</th>
                        <th>Salariu net</th>
                        <th>Email</th>
                        <th>Valoare tichet</th>
                        <th>Telefon</th>
                        
                        <th> <a href='php/add.php' class='btn btn-success btn-sm bi bi-plus-circle'></a> </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                if ($result->num_rows > 0) {
                    // Afișează datele pentru fiecare rând
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id_salariat'] . "</td>"; 
                        echo "<td>" . $row['salariat'] . "</td>";
                        echo "<td>" . $row['Functia'] . "</td>";
                        echo "<td>" . $row['Zile_lucrate'] . "</td>";
                        echo "<td>" . $row['Ore_lucrate'] . "</td>";
                        echo "<td>" . $row['Salariu_brut'] . "</td>";
                        echo "<td>" . $row['Concediu_medical'] . "</td>";
                        echo "<td>" . $row['CAS'] . "</td>";
                        echo "<td>" . $row['CASS'] . "</td>";
                        echo "<td>" . $row['Tichete_masa'] . "</td>";
                        echo "<td>" . $row['Baza_impozit'] . "</td>";
                        echo "<td>" . $row['Impozit_pe_venit'] . "</td>";
                        echo "<td>" . $row['Salariu_net'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['valoare_tichet'] . "</td>";
                        echo "<td>" . $row['telefon'] . "</td>";
                       
                        echo "<td>
                        
                        <a href='php/edit.php?id=" .$row['id_salariat'] ."'' class='btn btn-primary btn-sm bi bi-pen'></a>
                        
                        <a href='php/delete.php?id=" . $row['id_salariat'] . "'' class='btn btn-danger btn-sm bi bi-x-circle' onclick='return confirm(\"Esti sigur ca vrei sa stergi acest angajat?\");';)></a>
                        
                      </td>";
                echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nicio înregistrare găsită</td></tr>";
                }
                ?>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>Id</th>
                        <th>Salariat</th>
                        <th>Functia</th>
                        <th>Zile lucrate</th>
                        <th>Ore lucrate</th>
                        <th>Salariu brut</th>
                        <th>Concediu medical</th>
                        <th>CAS</th>
                        <th>CASS</th>
                        <th>Tichete de masă</th>
                        <th>Bază impozitabilă</th>
                        <th>Impozit pe venit</th>
                        <th>Salariu net</th>
                        <th>Email</th>
                        <th>Valoare tichet</th>
                        <th>Telefon</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>


<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery-3.5.1.js"></script>
<script src="./js/dataTables.bootstrap5.min.js"></script>
<script src="./js/jquery.dataTables.min.js"></script>
<script src="./js/script.js"></script>
</body>
</html>