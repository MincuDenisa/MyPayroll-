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
  
    
      </form>
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
            
          </div>
        </div>
       
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-DARK h-100">
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
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-DARK h-100" >
            <div class="card-body py-5">Total ore lucrate
              <?php 
              $queryore=('SELECT SUM(Ore_lucrate) as total_ore_lucrate FROM salariati');
              $queryore_run=mysqli_query($con,$queryore);
              if ($queryore_run) {
                $rowore= mysqli_fetch_assoc($queryore_run);
                $totalore = $rowore['total_ore_lucrate'];
    
                echo '<h4 class="mb-0"> ' . $totalore.  ' ore</h4>';
            } else {
                echo '<h4 class="mb-0"> Nici o ora</h4>';
            }
        ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100" >
            <div class="card-body py-5">Număr profesori
              <?php 
                $queryfunctia = "SELECT COUNT(*) as totalprof FROM salariati WHERE Functia IN ('învățător', 'învățătoare','Învățător')";
                $queryfunctia_run = mysqli_query($con, $queryfunctia);
                
                if($queryfunctia_run){
                    // Numără numărul de rânduri returnate de interogare
                    $dataprof = mysqli_fetch_assoc($queryfunctia_run);
                    $totalprof = $dataprof['totalprof'];
                    
                    // Afișează numărul de învățători/învățătoare
                    echo '<h4 class="mb-0"> '. $totalprof .' </h4>';
                } else {
                    // În caz de eroare sau dacă nu există înregistrări
                    echo '<h4 class="mb-0"> Nici un salariat </h4>';
                }
                ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-dark h-100">
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
           
          </div>
        </div>
        
        
        <div class="col-md-3 mb-3">
          <div class="card bg-info text-dark h-100">
            <div class="card-body py-5">Salariul net mediu
            <?php 
              $queryavg2 = 'SELECT AVG(Salariu_net) AS medie_salariu_net FROM salariati';
              $resultavg2 = mysqli_query($con, $queryavg2);
      
              if ($resultavg2) {
                  $rowavg2= mysqli_fetch_assoc($resultavg2);
                  $totalavg2 = $rowavg2['medie_salariu_net'];
      
                  echo '<h4 class="mb-0"> ' . number_format($totalavg2, 2) .  ' RON</h4>';
              } else {
                  echo '<h4 class="mb-0"> Nici un salariu </h4>';
              }
          ?>
            </div>
            
          </div>
        </div>
        
        <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100" >
            <div class="card-body py-5">Ore lucrate în medie
              <?php 
              $querymore=('SELECT AVG(Ore_lucrate) as medie_ore_lucrate FROM salariati');
              $querymore_run=mysqli_query($con,$querymore);
              if ($querymore_run) {
                $rowmore= mysqli_fetch_assoc($querymore_run);
                $totalmore = $rowmore['medie_ore_lucrate'];
    
                echo '<h4 class="mb-0"> '.number_format($totalmore, 2). ' ore</h4>';
            } else {
                echo '<h4 class="mb-0"> Nici o ora</h4>';
            }
        ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100" >
            <div class="card-body py-5">Număr administratori
              <?php 
                $queryadmin = "SELECT COUNT(*) as totaladmin FROM salariati WHERE Functia IN ('Director administrativ', 'admin')";
                $queryadmin_run = mysqli_query($con, $queryadmin);
                
                if($queryadmin_run){
                    // Numără numărul de rânduri returnate de interogare
                    $dataadmin = mysqli_fetch_assoc($queryadmin_run);
                    $totaladmin = $dataadmin['totaladmin'];
                    
                    // Afișează numărul de învățători/învățătoare
                    echo '<h4 class="mb-0"> '. $totaladmin .' </h4>';
                } else {
                    // În caz de eroare sau dacă nu există înregistrări
                    echo '<h4 class="mb-0"> Nici un salariat </h4>';
                }
                ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-DARK h-100" >
            <div class="card-body py-5">Total concedii medicale
              <?php 
              $queryconcediu=('SELECT SUM(Concediu_medical) AS total_concediu FROM salariati');
              $queryconcediu_run=mysqli_query($con,$queryconcediu);
              if ($queryconcediu_run) {
                $rowconcediu= mysqli_fetch_assoc($queryconcediu_run);
                $totalconcediu = $rowconcediu['total_concediu'];
    
                echo '<h4 class="mb-0"> ' . $totalconcediu.  ' RON</h4>';
            } else {
                echo '<h4 class="mb-0"> Nici un concediu</h4>';
            }
        ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100" >
            <div class="card-body py-5">Total contribuție socială datorată de angajator:
                    <?php
            // Funcție pentru a calcula contribuția dată procentului specific și salariului brut
            function calculeazaContributie($salariu_brut, $procent) {
                return $salariu_brut * ($procent / 100);
            }

            // Procentul de contribuție
            $procent_contributie = 2.25;

            // Interogare pentru a obține suma totală a salariilor brute
            $query_sb = 'SELECT SUM(Salariu_brut) AS total_salariu_brut FROM salariati';
            $result_sb = mysqli_query($con, $query_sb);

            // Verificăm dacă interogarea s-a executat cu succes
            if ($result_sb) {
                // Obținem rezultatul
                $row_sb = mysqli_fetch_assoc($result_sb);
                $total_sb = $row_sb['total_salariu_brut'];

                // Calculăm contribuția pentru fiecare angajat și adunăm la total
                $total_contributie = 0;
                $query_angajati = "SELECT Salariu_brut FROM salariati";
                $result_angajati = mysqli_query($con, $query_angajati);

                if ($result_angajati) {
                    while ($row_angajat = mysqli_fetch_assoc($result_angajati)) {
                        $salariu_angajat = $row_angajat['Salariu_brut'];
                        $total_contributie += calculeazaContributie($salariu_angajat, $procent_contributie);
                    }
                }

                // Afișăm totalul contribuției
                echo '<h4 class="mb-0"> ' .number_format($total_contributie, 2). ' RON</h4>';
            } else {
                echo '<h4 class="mb-0"> Nici un salariu </h4>';
            }
            ?>
              </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-danger text-white h-100" >
            <div class="card-body py-5">Total contribuții sociale datorate de angajați:
                      <?php
              // Funcție pentru a calcula contribuțiile sociale totale pentru un angajat
              function calculeazaContributiiSociale($Salariu_brut, $valoare_tichet,$Zile_lucrate,$Concediu_medical) {
                   $CAS = $Salariu_brut * 0.25; 
                  $CASS = $Salariu_brut * 0.1; 
                  $Tichete_masa = $valoare_tichet * $Zile_lucrate;
                  $Baza_impozit = $Salariu_brut - $CAS - $CASS - $Concediu_medical + $Tichete_masa;
                  $Impozit_pe_venit = $Baza_impozit * 0.1;
                  $total_contributii_sociale = $CAS + $CASS + $Impozit_pe_venit;

                  return $total_contributii_sociale;
              }

              // Interogare pentru a obține suma totală a salariilor brute
              $query_sb = 'SELECT SUM(Salariu_brut) AS total_salariu_brut FROM salariati';
              $result_sb = mysqli_query($con, $query_sb);

              // Verificăm dacă interogarea s-a executat cu succes
              if ($result_sb) {
                  // Obținem rezultatul
                  $row_sb = mysqli_fetch_assoc($result_sb);
                  $total_sb = $row_sb['total_salariu_brut'];

                  // Calculăm contribuțiile sociale totale pentru toți angajații
                  $total_contributii_sociale_angajati = 0;
                  $query_angajati = "SELECT * FROM salariati";
                  $result_angajati = mysqli_query($con, $query_angajati);

                  if ($result_angajati) {
                      while ($row_angajat = mysqli_fetch_assoc($result_angajati)) {
                          $salariu_angajat = $row_angajat['Salariu_brut'];
                          $tichet_angajat=$row_angajat['valoare_tichet'];
                          $zile_lucrate=$row_angajat['Zile_lucrate'];
                          $cm=$row_angajat['Concediu_medical'];
                          $total_contributii_sociale_angajati += calculeazaContributiiSociale($salariu_angajat,$tichet_angajat,$zile_lucrate,$cm);
                      }
                  }

                  // Afișăm totalul contribuțiilor sociale
                  echo '<h4 class="mb-0"> ' . $total_contributii_sociale_angajati . ' RON</h4>';
              } else {
                  echo '<h4 class="mb-0"> Nici un salariu </h4>';
              }
              ?>
              </div>
          </div>
      </div>
      </div>

      <div class="row"> <div class="col-md-12">
          <h4>Utilizatori</h4>
        </div>
      </div>
      <div class="row">

            <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100">
            <div class="card-body py-5">Număr utilizatori
            <?php 
              $queryuser=('SELECT * FROM utilizatori');
              $queryuser_run=mysqli_query($con,$queryuser);
              if($totalu=mysqli_num_rows($queryuser_run)){
                echo '<h4 class="mb-0"> '. $totalu .' </h4>';
              } else {
                echo '<h4 class="mb-0"> Nici un salariat </h4>';
              } ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">Număr de utilizatori creați luna aceasta: 
            <?php 

             $first_day_this_month = date("Y-m-01");
             $last_day_this_month = date("Y-m-t");
     
             // Interogare SQL pentru numărul de utilizatori creați luna aceasta
             $querythis = "SELECT COUNT(*) AS numar_utilizatori FROM utilizatori 
                       WHERE created_at BETWEEN '$first_day_this_month' AND '$last_day_this_month'";
             
             $resulthis = mysqli_query($con, $querythis);
     
             if ($resulthis) {
                 $rowthis = mysqli_fetch_assoc($resulthis);
                 $numar_utilizatori = $rowthis['numar_utilizatori'];
     
                 echo '<h4 class="mb-0"> ' . $numar_utilizatori . ' </h4>';
             } else {
                 echo '<h4 class="mb-0"> Eroare la calcularea statisticii </h4>';
             }
     
         ?>
    
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card bg-info text-white h-100">
            <div class="card-body py-5">Număr de utilizatori creați luna trecută:
    <?php 
        

        // Calculați prima și ultima zi a lunii trecute
        $first_day_last_month = date("Y-m-01", strtotime("first day of last month"));
        $last_day_last_month = date("Y-m-t", strtotime("last day of last month"));

        // Interogare SQL pentru numărul de utilizatori creați luna trecută
        $querynew = "SELECT COUNT(*) AS numar_utilizatori FROM utilizatori 
                  WHERE created_at BETWEEN '$first_day_last_month' AND '$last_day_last_month'";
        
        $resultnew = mysqli_query($con, $querynew);

        if ($resultnew) {
            $rownew = mysqli_fetch_assoc($resultnew);
            $numar_utilizatori = $rownew['numar_utilizatori'];

            echo '<h4 class="mb-0">  ' . $numar_utilizatori . ' </h4>';
        } else {
            echo '<h4 class="mb-0"> Eroare la calcularea statisticii </h4>';
        }

          ?>
            </div>
            
          </div>
        </div>
        <div class="col-md-3 mb-3">
    <div class="card bg-warning text-white h-100">
        <div class="card-body py-5">Număr de utilizatori creați azi:
            <?php 
                
                $querynews = "SELECT COUNT(*) AS numar_utilizatori FROM utilizatori 
                             WHERE DATE(created_at) = CURDATE()";
                
                $resultnews = mysqli_query($con, $querynews);

                if ($resultnews) {
                    $rownews = mysqli_fetch_assoc($resultnews);
                    $numar_utilizatori = $rownews['numar_utilizatori'];

                    echo '<h4 class="mb-0"> ' . $numar_utilizatori . ' </h4>';
                } else {
                    echo '<h4 class="mb-0"> Eroare la calcularea statisticii </h4>';
                }
            ?>
        </div>
    </div>
</div>
            </div>
            <div class="row"> <div class="col-md-12">
          <h4>Pontaj</h4>
        </div>
      </div>
            <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100" >
            <div class="card-body py-5">Număr intrări: 
              <?php 
              $queryint=('SELECT * FROM pontaj');
              $queryint_run=mysqli_query($con,$queryint);
              if($total=mysqli_num_rows($queryint_run)){
                echo '<h4 class="mb-0"> '. $total .' </h4>';
              } else {
                echo '<h4 class="mb-0"> Nici o intrare </h4>';
              } ?>
            </div>
            
          </div>
        </div>
       
        <div class="col-md-3 mb-3">
          <div class="card bg-primary text-white h-100">
            <div class="card-body py-5">  
            Număr ieșiri: 
                              <?php 
                                    $queryies=('SELECT * FROM pontaj');
                                    $queryies_run=mysqli_query($con,$queryies);
                                    if($totalies=mysqli_num_rows($queryies_run)){
                                        echo '<h4 class="mb-0"> '. $totalies .' </h4>';
                                    } else {
                                        echo '<h4 class="mb-0"> Nici o iesire </h4>';
                                    } ?>
                                    </div>
                                    
                                </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                <div class="card bg-info text-dark h-100">
                                    <div class="card-body py-5">
                                    Cel mai mare pontaj inregistrat:
                                    <?php
                        $queryMaxOreLucrate = "SELECT MAX(Ore_lucrate) AS max_ore_lucrate FROM pontaj";
                        $resultMaxOreLucrate = mysqli_query($con, $queryMaxOreLucrate);

                        if ($resultMaxOreLucrate && mysqli_num_rows($resultMaxOreLucrate) > 0) {
                            $rowMaxOreLucrate = mysqli_fetch_assoc($resultMaxOreLucrate);
                            $maxOreLucrate = $rowMaxOreLucrate['max_ore_lucrate'];
                            echo '<h4 class="mb-0"> '. $maxOreLucrate .' ore </h4>';
                        } else {
                            $maxOreLucrate = 0;
                           
                        }
                        ?>
            </div>
            
          </div>
        </div>
     
      <div class="col-md-3 mb-3">
          <div class="card bg-warning text-dark h-100">
            <div class="card-body py-5">Cel mai mic pontaj inregistrat:
                            <?php
                $queryMinOreLucrate = "SELECT MIN(Ore_lucrate) AS min_ore_lucrate FROM pontaj";
                $resultMinOreLucrate = mysqli_query($con, $queryMinOreLucrate);

                if ($resultMinOreLucrate && mysqli_num_rows($resultMinOreLucrate) > 0) {
                    $rowMinOreLucrate = mysqli_fetch_assoc($resultMinOreLucrate);
                    $minOreLucrate = $rowMinOreLucrate['min_ore_lucrate']; // Corectare aici
                    echo '<h4 class="mb-0"> '. $minOreLucrate .' ore </h4>';
                } else {
                    $minOreLucrate = 0;
                }
                ?>
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