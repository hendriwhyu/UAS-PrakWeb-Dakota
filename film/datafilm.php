<?php
include '../inc/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Data Film &mdash; Dakota</title>

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
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="../dashboard.php">Dakota</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="../dashboard.php">DKT</a>
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
                <li><a class="nav-link" href="../bioskop/databioskop.php">Data Bioskop</a></li>
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
                  <div class="card-header">
                    <h4>Film</h4>
                    <div class="card-header-action">
                      <a href="tambah.php?kode" title="Ubah" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i><span>Tambah Data</span>
                      </a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>ID Film</th>
                            <th>Nama Film</th>
                            <th>Genre</th>
                            <th>Tahun Rilis</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          $sql = $konek->query("select * from film ");
                          while ($data = $sql->fetch_assoc()) {
                          ?>

                            <tr>
                              <td>
                                <?php echo $no++; ?>
                              </td>
                              <td>
                                <?php echo $data['nama_film']; ?>
                              </td>
                              <td>
                                <?php echo $data['genre']; ?>
                              </td>
                              <td>
                                <?php echo $data['tahun_rilis']; ?>
                              </td>
                              <td>
                                <a href="edit.php?kode=<?php echo $data['id_film']; ?>" name="Ubah" title="Ubah" class="btn btn-success btn-sm">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a href="hapus.php?kode=<?php echo $data['id_film']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
                                  <i class="fa fa-trash"></i>
                                </a>
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
  <script src="../dist/assets/js/scripts.js"></script>
  <script src="../dist/assets/js/custom.js"></script>
</body>

</html>