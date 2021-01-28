<?php
  session_start();
  require("../assets/connect.php");

  //Orders
  $sql="SELECT COUNT(id) AS 'DARAB' FROM orders WHERE CONCAT(YEAR(date),MONTH(date)) LIKE CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));

  $actOrders=$result["DARAB"];

  $sql="SELECT COUNT(id) AS 'DARAB' FROM orders WHERE CONCAT(YEAR(date),MONTH(date)) LIKE (CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))-1) OR CONCAT(YEAR(date),MONTH(date)) LIKE (CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))-2) OR CONCAT(YEAR(date),MONTH(date)) LIKE (CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))-3)";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));

  $lastMonthsO=$result["DARAB"];

  if($lastMonthsO!=0){
    $percentAO=round($actOrders/$lastMonthsO*100,2); //Akt hónap viszonyítva az előző háromhoz
  }
  else{
    if($actOrders==0)
      $percentAO=0;
    else
      $percentAO=100*$actOrders;
  }

  if($percentAO<100){
    if($percentAO!=0) {$PAO=100-$percentAO; $AOd=true; }else { $PAO=0; $AOd=false; }//Akt hónap alakulása
    
  }else{
    $PAO=$percentAO-100;
    $AOd=false;
  }

  $sql="SELECT COUNT(id) AS 'UJ' FROM orders WHERE status = 0";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $ujRendelesek=$result["UJ"];
  $ertesitesek=0;
  $ertesitesek+=$result["UJ"];

  $sql="SELECT COUNT(id) AS 'FUGGO' FROM orders WHERE status IN ('1','2')";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $fuggoRendelesek=$result["FUGGO"];
  $ertesitesek+=$result["FUGGO"];


  //Incomes
  $actIncome=0;

  //Visits
  $sql="SELECT COUNT(visitorip) AS 'IP' FROM visitors WHERE CONCAT(YEAR(lastvisit),MONTH(lastvisit)) LIKE CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $actVisits=$result["IP"];

  $sql="SELECT COUNT(visitorip) AS 'IP' FROM visitors WHERE CONCAT(YEAR(lastvisit),MONTH(lastvisit)) LIKE (CONCAT(YEAR(CURRENT_TIMESTAMP()),MONTH(CURRENT_TIMESTAMP()))-1)";
  $result=mysqli_fetch_assoc(mysqli_query($conn,$sql));
  $lastVisits=$result["IP"];
  

  if($lastVisits!=0){
    $percentAV=round($actVisits/$lastVisits*100,2); //Akt hónap viszonyítva az előzőhöz
  }
  else{
    if($actVisits==0)
      $percentAV=0;
    else
      $percentAV=100*$actVisits;
  }

  if($percentAV<100){
    if($percentAV!=0) {$PAV=100-$percentAO; $AVd=true; }else { $PAV=0; $AVd=false; }//Akt hónap alakulása
    
  }else{
    $PAV=$percentAV-100;
    $AVd=false;
  }

?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content="co-author Springmann Dániel"/>
  <title>Exact Home Admin</title>
  <!--favicon-->
  <link rel="icon" href="/assets/admin/images/fav.ico" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="/assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="/assets/admin/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="/assets/admin/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="/assets/admin/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Metismenu CSS-->
  <link href="/assets/admin/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="/assets/admin/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme2">

<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
   
    <div class="brand-logo">
	  <img src="/assets/admin/images/fav.png" class="logo-icon" alt="logo icon">
	  <h5 class="logo-text">EHC Admin</h5>
	  <div class="close-btn"><i class="zmdi zmdi-close"></i></div>
   </div>
	  
    <ul class="metismenu" id="menu">
      <?php require "../assets/admin/php/menu.php" ?>
	  </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
 
	 <div class="toggle-menu">
		 <i class="zmdi zmdi-menu"></i>
	 </div>
     
   <ul class="navbar-nav align-items-center right-nav-link ml-auto">
    <li class="nav-item dropdown dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();">
        <i class="zmdi zmdi-notifications-active align-middle"></i><?php if($ertesitesek>0){ ?><span class="bg-info text-white badge-up"><?php echo $ertesitesek; ?></span><?php } ?></a>
      <div class="dropdown-menu dropdown-menu-right">
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Új értesítések
          </li>
          
          <li class="list-group-item">
            <a href="javaScript:void();">
              <div class="media">
                <i class="zmdi zmdi-coffee fa-2x mr-3 text-warning"></i>
                <div class="media-body">
                  <h6 class="mt-0 msg-title">Új rendelések</h6>
                  <p class="msg-info">Feldolgozásra váró rendelések</p>
                </div>
                <div class="badge badge-light ml-auto"><?php echo $ujRendelesek; ?></div>
              </div>
            </a>
          </li>
          <li class="list-group-item">
            <a href="javaScript:void();">
              <div class="media">
                <i class="zmdi zmdi-case-check fa-2x mr-3 text-primary"></i>
                <div class="media-body">
                  <h6 class="mt-0 msg-title">Függő rendelések</h6>
                  <p class="msg-info text-wrap">Feldolgozás vagy szállítás alatt álló rendelések</p>
                </div>
                <div class="badge badge-light ml-auto"><?php echo $fuggoRendelesek; ?></div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item dropdown language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();"><i class="flag-icon flag-icon-hu align-middle"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"><i class="flag-icon flag-icon-gb mr-3"></i>English</li>
          <li class="dropdown-item"><i class="flag-icon flag-icon-hu mr-3"></i>Magyar</li>
        </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" data-toggle="dropdown" href="javascript:void();">
        <span class="user-profile"><img src="/assets/admin/images/placeholder/NaponTamas.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="/assets/admin/images/placeholder/NaponTamas.png" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title">Napon Tamás</h6>
            <p class="user-subtitle">napontamas@demo.hu</p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <a href="/admin/felhasznalo/"><li class="dropdown-item"><i class="zmdi zmdi-balance-wallet mr-3"></i>Fiókom</li></a>
        <li class="dropdown-divider"></li>
        <a href="/admin/beallitasok"><li class="dropdown-item"><i class="zmdi zmdi-settings mr-3"></i>Beállítások</li></a>
        <li class="dropdown-divider"></li>
        <a href="/admin/kijelentkezes/"><li class="dropdown-item"><i class="zmdi zmdi-power mr-3"></i>Kijelentkezés</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0 ">
            <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><span><?php echo $actOrders; ?></span> <span class="float-right"><i class="fa fa-shopping-cart"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                       <div class="progress-bar" style="width:<?php echo $percentAO; ?>%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Összes rendelés a hónapban<span class="float-right" data-toggle="tooltip" data-placement="top" data-original-title="Az előző 3 hónaphoz képest."><?php if($AOd) echo "-"; else echo "+";  echo $PAO; ?>% <i class="zmdi <?php if($AOd) echo "zmdi-long-arrow-down"; else echo "zmdi-long-arrow-up"; ?>"></i></span></p>
                </div>
            </div>
            <!--<div class="col-12 col-lg-6 col-xl-4 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><span id="total-revenue-number">0</span> <span id="revenue-currency">Ft</span> <span class="float-right"><i class="fa fa-usd"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                    <div class="progress-bar" style="width:0%"></div>
                    </div>
                  <p class="mb-0 text-white small-font" id="revenue-changes">Összes bevétel a hónapban<span class="float-right" data-toggle="tooltip" data-placement="top" data-original-title="Az előző 3 hónaphoz képest.">0% <i class="zmdi zmdi-long-arrow-up"></i></span></p>
                </div>
            </div>-->
            <div class="col-12 col-lg-6 col-xl-6 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><span id="total-visitor-number"><?php echo $actVisits; ?></span> <span class="float-right"><i class="fa fa-eye"></i></span></h5>
                    <div class="progress my-3" style="height:5px;">
                    <div class="progress-bar" style="width:<?php echo $percentAV; ?>%"></div>
                    </div>
                  <p class="mb-0 text-white small-font" id="visitor-changes">Látogató a hónapban <span class="float-right" data-toggle="tooltip" data-placement="top" data-original-title="Az előző hónaphoz képest."><?php if($AVd) echo "-"; else echo "+";  echo $PAV; ?>% <i class="zmdi <?php if($AVd) echo "zmdi-long-arrow-down"; else echo "zmdi-long-arrow-up"; ?>"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
	 <!-- WIP 
	<div class="row">
     <div class="col-12 col-lg-12 col-xl-12">
	    <div class="card">
		 <div class="card-header">Forgalom
		   <div class="card-action">
			 <div class="dropdown">
			 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
			  <i class="icon-options"></i>
			 </a>
				<div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="javascript:void();">Utolsó 6 hónap</a>
          <a class="dropdown-item" href="javascript:void();">Utolsó 1 hét</a>
          <a class="dropdown-item" href="javascript:void();">Utolsó 24 óra</a>
        </div>
			  </div>
		   </div>
		 </div>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>Új látogatók</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>Visszatérő látogatók</li>
			</ul>
			<div class="chart-container-1">
			  <canvas id="visitorsChart"></canvas>
			</div>
		 </div>
		 
		</div>
	 </div>
	</div>--><!--End Row-->

  <!-- WIP
  <div class="row">
    <div class="col-12 col-lg-12 col-xl-12">
      <div class="card">
        <div class="card-header">TOP4 eladási ország</div>
        <div class="card-body">
           <div id="world-map" style="height: 280px;"></div>
            <div class="table-responsive mt-2">
              <table class="table table-borderless align-items-center">
                <tbody>
                  <tr>
                   <td><i class="fa fa-circle mr-2" style="color: #fff;"></i> Magyarország</td>
                   <td>18 %</td>
                   <td><i class="fa fa-circle mr-2" style="color: #fff;"></i> Anglia</td>
                   <td>14.2 %</td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle mr-2" style="color: #fff;"></i> Kanada</td>
                   <td>15 %</td>
                   <td><i class="fa fa-circle mr-2" style="color: #fff;"></i> USA</td>
                   <td>11.6 %</td>
                 </tr>
                </tbody>
              </table>
            </div>
        </div> 
      </div>
    </div>
	 
  </div>--><!--End Row-->


    <div class="row">
      <div class="col-12 col-lg-8 col-xl-8">
         <div class="card">
           <div class="card-header">Utolsó 5 értékelés
              <div class="card-action">
                <div class="dropdown">
                  <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                    <i class="icon-options"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="hozzaszolasok/">Összes értékelés</a>
                  </div>
                </div>
              </div>
           </div>
           <ul class="list-group list-group-flush">
            <?php 
              $sql="SELECT u.name AS 'user', p.nameHU AS 'product', i.srcurl AS 'photo', c.comment AS 'comment', c.stars AS 'stars', c.date AS 'date' FROM comments c INNER JOIN users u ON c.customerid=u.id INNER JOIN products p ON c.productid=p.id INNER JOIN prodimg pimg ON p.id=pimg.prodid INNER JOIN images i ON pimg.imgid=i.id WHERE pimg.sorrend=1 ORDER BY c.date DESC LIMIT 5";

              $result = mysqli_query($conn,$sql);
              echo mysqli_error($conn);
              if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($row)){
            ?>
              <li class="list-group-item bg-transparent">
                <div class="media align-items-center">
                  <img src="../uploads/products/<?php echo $row["photo"]; ?>" alt="<?php echo $row["product"] ?>" class="customer-img rounded-circle">
                  <div class="media-body ml-3">
                    <h6 class="mb-0"><?php echo $row["product"]; ?> <small class="ml-4"><?php echo $row["date"]; ?></small></h6>
                    <p class="mb-0 small-font text-wrap"><?php echo $row["user"]; ?> : <?php echo $row["comment"]; ?> </p>
                  </div>
                  <div class="star">
                    <?php 
                      $star=$row["stars"];
                      $unstar=5-$star;

                      for($i=0;$i<$star;$i++){
                    ?>
                    <i class="zmdi zmdi-star"></i>
                    <?php
                      }

                      for($i=0;$i<$unstar;$i++){
                    ?>
                    <i class="zmdi zmdi-star text-light"></i>
                    <?php
                      }
                    ?>
                  </div>
                </div>
              </li>
            <?php
                }
              }
              else{
            ?>
            <li class="list-group-item bg-transparent">
              <div class="media align-items-center">
                <div class="media-body ml-3">
                  <h6 class="mb-0 text-center">Nincsenek hozzászólások</h6>
                </div>
              </div>
            </li>
            <?php
              }
            ?>
            </ul>
         </div>
      </div>
      
      <div class="col-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">TOP10 eladott termékek
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush table-borderless">
                <thead>
                  <tr>
                    <th>Megnevezés</th>
                    <th>Eladott mennyiség</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql="SELECT p.nameHU, COUNT(op.idordprod) AS 'count' FROM ordprod op INNER JOIN products p ON op.prodid = p.id GROUP BY op.prodid ORDER BY COUNT(op.idordprod) DESC LIMIT 10";
                    $result=mysqli_query($conn,$sql);

                    if(mysqli_num_rows($result)>0){
                      while($row=mysqli_fetch_assoc($result)){
                  ?>
                          <tr>
                            <td>
                              <?php echo $row["nameHU"]; ?>
                            </td>
                            <td>
                              <?php echo $row["count"]; ?>
                            </td>
                          </tr>
                  <?php
                      }
                    }
                    else{
                  ?>
                      <tr>
                        <td colspan="2" class="text-center">
                          <h6>Még nem érkezett rendelés</h6>
                        </td>
                      </tr>
                  <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div><!--End Row-->
	
	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	      <div class="card-header">Új rendelések
          <div class="card-action">
            <div class="dropdown">
              <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="rendelesek/">Összes rendelés</a>
              </div>
            </div>
          </div>
		    </div>
	       <div class="table-responsive">
            <table class="table align-items-center table-flush table-borderless">
              <thead>
                <tr>
                  <th>Megrendelő</th>
                  <th>Rendelés azonosító</th>
                  <th>Összeg</th>
                  <th>Rendelés időpontja</th>
                  <th>Állapot</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql="SELECT u.name AS 'name', o.id AS 'id', o.price AS 'price', o.currency AS 'currency', o.date AS 'date', o.status AS 'status', o.paid AS 'paid', o.paymentid AS 'method' FROM orders o INNER JOIN users u ON o.customerid=u.id WHERE o.status NOT IN ('3') ORDER BY o.date DESC";

                  $result=mysqli_query($conn,$sql);

                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <a href="rendeles/<?php echo $row["id"]; ?>">
                  <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td>#<?php echo $row["id"]; ?></td>
                    <td><?php if($row["currency"]=="HUF"){ echo $row["price"]; echo "Ft";} else { echo "£"; echo $row["price"]; } ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td>
                      <div class="progress shadow" style="height: 7px;" data-toggle="tooltip" data-placement="top" title="<?php if($row["paid"] && $row["method"]!=3){ switch($row["status"]){ case 0:{ echo "Leadott"; break; } case 1:{ echo "Feldolgozás alatt"; break; } case 2:{ echo "Szállítás alatt"; break; } } }else{ echo "Fizetésre vár"; }?>">
                        <div class="progress-bar gradient-jshine" role="progressbar" style="width: <?php if($row["paid"] && $row["method"]!=3){ switch($row["status"]){ case 0:{ echo "25"; break; } case 1:{ echo "50"; break; } case 2:{ echo "90"; break; } } }else{ echo "0"; }?>%"></div>
                      </div>
                    </td>
                  </tr>
                </a>
                <?php
                    }
                  }
                  else{
                ?>
                <tr>
                  <td class="text-center" colspan="5"><h6>Jelenleg nincsenek rendelések</h6></td>
                </tr>
                <?php
                  }
                ?>

              </tbody>
            </table>
          </div>
	   </div>
	 </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->
    <!--start overlay-->
	  <div class="overlay"></div>
	<!--end overlay-->
	
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2020 W3D<br>
          
        </div>
      </div>
    </footer>
	<!--End footer-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="/assets/admin/js/jquery.min.js"></script>
  <script src="/assets/admin/js/popper.min.js"></script>
  <script src="/assets/admin/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="/assets/admin/plugins/simplebar/js/simplebar.js"></script>
  <!-- Metismenu js -->
  <script src="/assets/admin/plugins/metismenu/js/metisMenu.min.js"></script>
  <!-- loader scripts -->
  <!--<script src="/assets/admin/js/jquery.loading-indicator.js"></script>-->
  <!-- Custom scripts -->
  <script src="/assets/admin/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="/assets/admin/plugins/Chart.js/Chart.min.js"></script>
  <!-- Vector map JavaScript -->
  <script src="/assets/admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
  <script src="/assets/admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- Easy Pie Chart JS -->
  <script src="/assets/admin/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
  <!-- Sparkline JS -->
  <script src="/assets/admin/plugins/sparkline-charts/jquery.sparkline.min.js"></script>
  <script src="/assets/admin/plugins/jquery-knob/excanvas.js"></script>
  <script src="/assets/admin/plugins/jquery-knob/jquery.knob.js"></script>
    
    <script>
        $(function() {
            $(".knob").knob();
        });
    </script>
  <!-- Index js -->
  <!--<script src="/assets/admin/js/index.js"></script>-->

  <script>
  
  </script>
  
</body>
</html>

<?php
  mysqli_close($conn);
?>