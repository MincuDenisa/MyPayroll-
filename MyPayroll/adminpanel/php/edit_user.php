<?php 
session_start();
include('../php/config.php');

$sql = "SELECT * FROM utilizatori";
$result = $con->query($sql);

            if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Preia datele angajatului din baza de date
            $query = "SELECT * FROM utilizatori WHERE id = ?";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            }
                // Afișează formularul cu datele angajatului
         ?>
         <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet"
     href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="../adminpanel/adminpanel.css">
    <link rel="stylesheet" href="../css/style.css" >
    
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
  
    <div class="collapse navbar-collapse" id="topNavBar">
      
      <form class="d-flex ms-auto my-3 my-lg-0">
        <div class="input-group">
            <input 
            type="search"
            class="form-control" 
            placeholder="Search" 
            aria-label="Search" 
           >
            <button 
            class="btn btn-primary" 
            type="submit" 
            >
            <i class="bi bi-search-heart"></i>
             </button>
        </div>
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
                <li>
                    <a href="#" class="nav-link px-3">
                        <span class="me-2"><i class="bi bi-book-fill"></i></span>
                        <span>Pages</span>
                      </a>
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
          <h4>Utilizatori</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card bg-success text-white h-100" >
            <div class="card-body py-5">Număr utilizatori
              <?php 
              $queryuser=('SELECT * FROM utilizatori');
              $queryuser_run=mysqli_query($con,$queryuser);
              if($totaluser=mysqli_num_rows($queryuser_run)){
                echo '<h4 class="mb-0"> '. $totaluser .' </h4>';
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
            <div class="card-footer d-flex">
            Vezi statistici
              <span class="ms-auto">
              <a href="statistici.php"><i class="bi bi-chevron-right" style="color: white;"></i></a>
              </span>
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
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Email</th>
                        <th>Parola</th>
                        <th>Id salariat</th>
                        <th>Data creare cont</th>
                        
                        <th> <a href='php/add_user.php' class='btn btn-success btn-sm bi bi-plus-circle'></a> </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if ($row = mysqli_fetch_assoc($result)) {}?>
                  <form action="edit_user_action.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <td>  <div class="form-group">
                        <label for="Nume">Nume</label>
                        <input type="text" class="form-control" id="Nume" name="Nume"  value="<?php echo $row['Nume']; ?>">
                    </div> </td>
                   <td> <div class="form-group">
                        <label for="Prenume">Prenume</label>
                        <input type="text" class="form-control" id="Prenume" name="Prenume"  value="<?php echo $row['Prenume']; ?>">
                    </div></td>
                   <td> <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $row['Email']; ?>">
                    </div></td>
                    <td> <div class="form-group">
                        <label for="Parola">Parola</label>
                        <input type="password" class="form-control" id="Parola" name="Parola" value="<?php echo $row['Parola']; ?>">
                    </div></td>
                    <td> <div class="form-group">
                        <label for="Rolul">Rolul</label>
                        <input type="number" class="form-control" id="Rolul" name="Rolul"  value="<?php echo $row['Rolul']; ?>">
                    </div></td>
                    <td> <div class="form-group">
                        <label for="id_salariat">Id salariat</label>
                        <input type="number" class="form-control" id="id_salariat" name="id_salariat" value="<?php echo $row['id_salariat']; ?>" >
                    </div></td>
                    <td> <div class="form-group">
                        <label for="created_at">Data creare cont</label>
                        <input type="date" class="form-control" id="created_at" name="created_at" value="<?php echo $row['created_at']; ?>"  >
                    </div></td>
                    <td><button type="submit" class="btn btn-primary">Salvează</button></td>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th>Email</th>
                        <th>Parola</th>
                        <th>Id salariat</th>
                        <th>Data creare cont</th>
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