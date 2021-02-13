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
  <title>Data Nasabah</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
  <link rel="stylesheet" href="../assets/css/style.css">
  <script  src="../assets/js/Chart.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
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

  <main class="page-content">
    <div class="container-fluid">
      <div class="row">
        <div class="form-group col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Data Nasabah</h5>
              </div>
              <div class="card-body">
                <table id="example" class="table table-striped table-bordered" style="width:100%">     
                  <thead>
                    <tr>
                      <th>kode Nasabah</th>
                      <th>Alamat</th>
                      <th>Status Pekerjaan</th>
                      <th>Jenis Kelamin</th>
                      <th>Kode Lokasi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $data = mysqli_query($koneksi,"select * from nasabah");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $d['kodenasabah']; ?></td>
                        <td><?php echo $d['alamat']; ?></td>
                        <td><?php echo $d['statuspekerjaan']; ?></td>
                        <td><?php echo $d['jeniskelamin']; ?></td>
                        <td><?php echo $d['kodelokasi']; ?></td>
                        <td>
                          <a href="editnasabah.php?kodenasabah=<?php echo $d['kodenasabah']; ?>" onclick="return confirm('Yakin ingin ubah data ini ?');"><button class="btn btn-success btn-sm"> Ubah </button>
                          </a>
                          <a  href="hapusnasabah.php?kodenasabah=<?php echo $d['kodenasabah']; ?>" onclick="return confirm('Yakin ingin dihapus ?');"><button class="btn btn-danger btn-sm"> Hapus </button></a>
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
      </div>    
    </div>
  </main>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script  src="../assets/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>