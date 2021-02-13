<?php 
	include '../koneksi.php';
	session_start();
	if($_SESSION['status']==""){
		header("location:../index.php?pesan=gagal");
	}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script  src="../assets/js/Chart.js"></script>
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#">Asuransi Kendaraan</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
            alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <?php echo $_SESSION['username']; ?>
          </span>
          <span class="user-role">
            <?php echo $_SESSION['status']; ?>
          </span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
      </div>

      <div class="sidebar-menu">
        <ul>
          <li>
            <a href="index.php">
              <i class="fa fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-table"></i>
              <span>Data</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="nasabah.php">Nasabah</a>
                </li>
                <li>
                  <a href="kendaraan.php">Kendaraan</a>
                </li>
                <li>
                  <a href="polis.php">Polis</a>
                </li>
                <li>
                  <a href="premi.php">Premi</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
    </div>
    <div class="sidebar-footer">
      <a href="../logout.php">
        <i class="fa fa-power-off"></i>
        <span>Log Out</span>
      </a>
    </div>
  </nav>

  <main class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="form-group col-md-12">
          <div class="card">
            <div class="card-header">
              <h5>Jumlah Nasabah</h5>
            </div>
            <div class="card-body">
              <?php
                $conn = mysqli_connect("localhost","root","","asuransi");
                $sqlQuery = "Select count(kodenasabah) as 'nasabah' from nasabah";
                $result = mysqli_query($conn,$sqlQuery);
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
              ?>
              <h2><i class="fa fa-user-circle" style="font-size: 30px;"></i> <?php echo $row["nasabah"];?></h2>
            </div>
          </div>
        </div>
      </div>    

      <div class="row">
        <div class="form-group col-md-6">
          <div class="card">
            <div class="card-header">
              <h5>Tipe Polis Tertinggi dan Terendah</h5>
            </div>
            <div class="card-body">
              <canvas id="Chart1"></canvas>
              <script>
                var ctx = document.getElementById("Chart1").getContext('2d');
                var Chart1 = new Chart(ctx, {
                  type: 'horizontalBar',
                  data: {
                    labels: ["Corporate Auto", "Personal Auto", "Special Auto"],
                    datasets: [{
                      label: 'Total',
                      data: [             
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi");
                      $jumlah_corporate = mysqli_query($koneksi,"select * from polis where tipepolis='Corporate Auto'");
                      echo mysqli_num_rows($jumlah_corporate);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_personal = mysqli_query($koneksi,"select * from polis where tipepolis='Personal Auto'");
                      echo mysqli_num_rows($jumlah_personal);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_special = mysqli_query($koneksi,"select * from polis where tipepolis='Special Auto'");
                      echo mysqli_num_rows($jumlah_special);
                      ?>,
                      ],
                      backgroundColor: [
                      'rgba(255, 99, 132, 0.9)',
                      'rgba(54, 162, 235, 0.9)',
                      'rgba(224, 210, 83, 0.9)'
                      ],
                      borderColor: [
                      'rgba(255,99,132,1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(224, 210, 83, 1)'
                      ],
                      borderWidth: 1
                    }]
                  },
                });
              </script>
            </div>                        
          </div>
        </div>

        <div class="form-group col-md-6">
          <div class="card">
            <div class="card-header">
              <h5>Klaim Berdasarkan Jenis Kendaraan</h5>
            </div>
            <div class="card-body">
              <canvas id="Chart2"></canvas>
              <script>
                var ctx = document.getElementById("Chart2").getContext('2d');
                var Chart2 = new Chart(ctx, {
                  type: 'doughnut',
                  data: {
                    labels: ["Four-Door Car", "Luxury Car", "Luxury SUV", "Sports Car", "SUV", "Two-Door Car"],
                    datasets: [{
                      label: 'Total',
                      data: [
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_fourdoorcar = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='Four-Door Car'");
                      echo mysqli_num_rows($jumlah_fourdoorcar);
                      ?>, 
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_luxurycar = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='Luxury Car'");
                      echo mysqli_num_rows($jumlah_luxurycar);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_luxurysuv = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='Luxury SUV'");
                      echo mysqli_num_rows($jumlah_luxurysuv);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_sportscar = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='Sports Car'");
                      echo mysqli_num_rows($jumlah_sportscar);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi"); 
                      $jumlah_suv = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='SUV'");
                      echo mysqli_num_rows($jumlah_suv);
                      ?>,
                      <?php 
                      $koneksi = mysqli_connect("localhost","root","","asuransi");
                      $jumlah_twodoorcar = mysqli_query($koneksi,"select * from kendaraan where jeniskendaraan='Two-Door Car'");
                      echo mysqli_num_rows($jumlah_twodoorcar);
                      ?>
                      ],
                      backgroundColor: [
                      'rgba(138, 245, 66, 0.9)',
                      'rgba(70, 122, 113, 0.9)',
                      'rgba(129, 60, 176, 0.9)',
                      'rgba(222, 204, 191, 0.9)',
                      'rgba(185, 194, 56, 0.9)',
                      'rgba(17, 9, 94, 0.9)'
                      ],
                      borderColor: [
                      'rgba(138, 245, 66, 0.2)',
                      'rgba(70, 122, 113, 0.2)',
                      'rgba(129, 60, 176, 0.2)',
                      'rgba(222, 204, 191, 0.2)',
                      'rgba(185, 194, 56, 0.2)',
                      'rgba(17, 9, 94, 0.2)',
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero:true
                        }
                      }]
                    }
                  }
                });
              </script>
            </div>                        
          </div>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6">
          <div class="card">
            <div class="card-header">
              <h5>Nasabah Berdasarkan Kode Lokasi</h5>
            </div>
            <div class="card-body">
              <canvas id="Chart4"></canvas>
              <script>
                var ctx = document.getElementById("Chart4").getContext('2d');
                var Chart1 = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: ["Urban", "Suburban", "Rural"],
                    datasets: [{
                      label: 'Total',
                      data: [                       
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi");
                      $F = mysqli_query($koneksi,"select * from nasabah where kodelokasi='Urban'");
                      echo mysqli_num_rows($F);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi");
                      $M = mysqli_query($koneksi,"select * from nasabah where kodelokasi='Suburban'");
                      echo mysqli_num_rows($M);
                      ?>,
                      <?php
                      $koneksi = mysqli_connect("localhost","root","","asuransi");
                      $U = mysqli_query($koneksi,"select * from nasabah where kodelokasi='Rural'");
                      echo mysqli_num_rows($U);
                      ?>                             
                      ],
                      backgroundColor: [
                      'rgba(88, 162, 343, 2.0)',
                      'rgba(224, 210, 83, 2.0)',
                      'rgba(255, 0, 43, 2.0)'
                      ],
                      borderColor: [
                      'rgba(250, 252, 251, 1.0)',
                      'rgba(224, 210, 83, 1.0)',
                      'rgba(250, 252, 251, 1.0)'
                      ],
                      borderWidth: 1
                    }]
                  },
                });
              </script>
            </div>                        
          </div>          
        </div>

        <div class="form-group col-md-6">
          <div class="card">
            <div class="card-header">
              <h5>Pendapatan Per Bulan</h5>
            </div>
            <div class="card-body">
              <canvas id="myChart"></canvas>
              <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    <?php
                    $koneksi = mysqli_connect("localhost","root","","asuransi");
                    $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"]; 
                    for($bulan = 1;$bulan < 13;$bulan++)
                    {
                      $query = mysqli_query($koneksi,"SELECT AVG(total) AS JMLKLAIM FROM premi where month(tanggal)='$bulan'");
                      $row = $query->fetch_array();
                      $jumlah_klaim[] = $row['JMLKLAIM'];
                    }
                    ?>
                    labels: <?php echo json_encode($label); ?>,
                    datasets: [{
                      label: 'Pendapatan Per Bulan',
                      data: <?php echo json_encode($jumlah_klaim); ?>,
                      backgroundColor: [
                      'rgba(255, 99, 132, 0.9)',
                      'rgba(88, 162, 343, 0.9)',
                      'rgba(22, 339, 677, 0.9)',
                      'rgba(54, 162, 235, 0.9)',
                      'rgba(224, 210, 83, 0.9)',
                      'rgba(225, 120, 235, 0.9)',
                      'rgba(235, 139, 120, 0.9)',
                      'rgba(103, 141, 156, 0.9)',
                      'rgba(149, 191, 170, 0.9)',
                      'rgba(255, 166, 0, 0.9)',
                      'rgba(242, 255, 0, 0.9)',            
                      'rgba(255, 0, 43, 0.9)'
                      ],
                      borderColor: [
                      'rgba(255, 99, 132, 0.9)',
                      'rgba(88, 162, 343, 0.9)',
                      'rgba(22, 339, 677, 0.9)',
                      'rgba(54, 162, 235, 0.9)',
                      'rgba(224, 210, 83, 0.9)',
                      'rgba(225, 120, 235, 0.9)',
                      'rgba(235, 139, 120, 0.9)',
                      'rgba(103, 141, 156, 0.9)',
                      'rgba(149, 191, 170, 0.9)',
                      'rgba(255, 166, 0, 0.9)',
                      'rgba(242, 255, 0, 0.9)',            
                      'rgba(255, 0, 43, 0.9)'
                      ],
                      borderWidth: 1
                    }]
                  },
                  options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero:true
                        }
                      }]
                    }
                  }
                });
              </script>
            </div>                        
          </div>          
        </div>
      </div>
    </div>
  </main>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script src="../assets/js/script.js"></script>
</body>
</html>