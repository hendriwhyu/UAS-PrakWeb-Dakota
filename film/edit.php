<?php
include '../inc/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Edit Film &mdash; Dakota</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="../dist/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../dist/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="icon" type="image/x-icon" href="../logo.png">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../dist/assets/css/style.css">
  <link rel="stylesheet" href="../dist/assets/css/components.css">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->


</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto" method="">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="dashboard.php">Dakota</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="dashboard.php">DKT</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="menu"><a class="nav-link" href="../dashboard.php" ">
                            <i class=" fas fa-home"></i>
                <span>Dashboard</span></a></li>
            <li class="dropdown active">
              <a href="#" class=" nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kelola Data</span></a>
              <ul class="dropdown-menu">
                <li class="active"><a class="nav-link" href="datafilm.php">Data Film</a></li>
                <li><a class="nav-link" href="../databioskop.php">Data Bioskop</a></li>
              </ul>
            </li>
            <li class="menu-header">Setting</li>
            <li class="menu"><a class="nav-link" href="../inc/action-logout.php" ">
                <i class=" fas fa-sign-out-alt"></i>
                <span>Logout</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Film</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Kelola Data</a></div>
              <div class="breadcrumb-item">Data Film</div>
            </div>
          </div>

          <div class="section-body">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <form method="POST">
                    <div class="card-header">
                      <h4>Edit Data</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group">
                        <label>Nama Film</label>
                        <input type="text" class="form-control" name="nama_film">
                      </div>
                      <div class="form-group">
                        <label>Genre</label>
                        <input type="text" class="form-control" name="genre">
                      </div>
                      <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control" name="tahun_rilis">
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <input type="submit" name="edit" value="Edit" class="btn btn-success">
                      <a href="datafilm.php" class="btn btn-secondary">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
    <footer class="main-footer">
      <div class="footer-left">
        Copyright &copy; 2022 <div class="bullet"></div> Design By Hendri Wahyu Perdana
      </div>
      <div class="footer-right">

      </div>
    </footer>
  </div>
  </div>

  <!-- General JS Scripts -->
  <script src="../dist/assets/modules/jquery.min.js"></script>
  <script src="../dist/assets/modules/popper.js"></script>
  <script src="../dist/assets/modules/tooltip.js"></script>
  <script src="../dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="../dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="../dist/assets/modules/moment.min.js"></script>
  <script src="../dist/assets/js/stisla.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="dist/assets/js/scripts.js"></script>
  <script src="dist/assets/js/custom.js"></script>
</body>

</html>
<?php
$kode = $_GET['kode'];
$sql_cek = "SELECT * FROM film WHERE id_film='" . $_GET['kode'] . "'";
$query_cek = mysqli_query($konek, $sql_cek);
$data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
if (isset($_POST['edit'])) {
  $nama_film = $_POST['nama_film'];
  $genre = $_POST['genre'];
  $tahun_rilis = $_POST['tahun_rilis'];
  if (empty($nama_film) || empty($genre) || empty($tahun_rilis)) {
    echo "<script>
      swal('Oops!', 'Data anda kosong', 'error');</script>";
  } else {
    $query = mysqli_query($konek, "UPDATE film SET nama_film='" . $_POST['nama_film'] . "', genre='" . $_POST['genre'] . "',tahun_rilis='" . $_POST['tahun_rilis'] . "' WHERE id_film='$kode'");
    echo "<script>
        swal({title: 'Edit Data Berhasil',text: 'Data telah diubah',icon: 'success',confirmButtonText: 'OK'
        }).then((result) => {if (result){
            window.location = 'datafilm.php';
            }
        })
        </script>";
  }
}
?>