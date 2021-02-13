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
  <title>Edit Data Kendaraan</title>
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
              <i class="fa fa-upload"></i>
              <span>Import Data</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="importnasabah.php">Nasabah</a>
                </li>
                <li>
                  <a href="importkendaraan.php">Kendaraan</a>
                </li>
                <li>
                  <a href="importpolis.php">Polis</a>
                </li>
                <li>
                  <a href="importpremi.php">Premi</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-plus"></i>
              <span>Tambah Data</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="tambahnasabah.php">Nasabah</a>
                </li>
                <li>
                  <a href="tambahkendaraan.php">Kendaraan</a>
                </li>
                <li>
                  <a href="tambahpolis.php">Polis</a>
                </li>
                <li>
                  <a href="tambahpremi.php">Premi</a>
                </li>
                <li>
                  <a href="tambahuser.php">User</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-table"></i>
              <span>Data</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="vnasabah.php">Nasabah</a>
                </li>
                <li>
                  <a href="vkendaraan.php">Kendaraan</a>
                </li>
                <li>
                  <a href="vpolis.php">Polis</a>
                </li>
                <li>
                  <a href="vpremi.php">Premi</a>
                </li>
                <li>
                  <a href="vuser.php">User</a>
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

  <?php
  include '../koneksi.php';
  $nomorkendaraan = $_GET['nomorkendaraan'];
  $data = mysqli_query($koneksi,"select * from kendaraan where nomorkendaraan='$nomorkendaraan'");
  while($d = mysqli_fetch_array($data)){
  ?>

  <main class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="form-group col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Ubah Data Kendaraan</h5>
              </div>
              <div class="card-body">
                <form method="post" action="datakendaraanaksi.php">
                  <div class="row">
                    <div class="col-sm-6 offset-sm-3">
                      <a href="vkendaraan.php">Kembali</a>          
                      <div class="form-group">
                        <input type="hidden" name="nomorkendaraan" class="form-control" required="true" value="<?php echo $d['nomorkendaraan'];?>">
                      </div>                    
                      <div class="form-group">
                        <label>Kode Nasabah</label>
                        <input type="text" name="kodenasabah" class="form-control" required="true" value="<?php echo $d['kodenasabah'];?>">
                      </div>  
                      <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select name="jeniskendaraan" class="form-control" required="true">
                          <option disabled selected>Pilih Jenis Kendaraan</option>
                          <option value="Four-Door Car" <?php if($d['jeniskendaraan'] == 'Four-Door Car'){ echo 'selected'; } ?>>Four-Door Car</option>
                          <option value="Luxury Car" <?php if($d['jeniskendaraan'] == 'Luxury Car'){ echo 'selected'; } ?>>Luxury Car</option>
                          <option value="Luxury SUV" <?php if($d['jeniskendaraan'] == 'Luxury SUV'){ echo 'selected'; } ?>>Luxury SUV</option>
                          <option value="Sports Car" <?php if($d['jeniskendaraan'] == 'Sports Car'){ echo 'selected'; } ?>>Sports Car</option>
                          <option value="SUV" <?php if($d['jeniskendaraan'] == 'SUV'){ echo 'selected'; } ?>>SUV</option>
                          <option value="Two-Door Car" <?php if($d['jeniskendaraan'] == 'Two-Door Car'){ echo 'selected'; } ?>>Two-Door Car</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" name="simpan" id="simpan" class="btn btn-primary">Simpan
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
      </div>    
    </div>
  </main>
    <?php

    }
    ?>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script src="../assets/js/script.js"></script>
</body>
</html>