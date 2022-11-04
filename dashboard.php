<?php
include 'inc/koneksi.php';
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['status'] != "login") {
    //melakukan pengalihan
    echo "<script>
        swal({title: 'Gagal Login',text: 'Username / Password anda salah',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = 'index.php';
            }
        })</script>";
}

?>
<?php
$data_film = mysqli_query($konek, "select distinct(genre) from film order by genre asc");
$genre = mysqli_query($konek, "select count(genre) as gnr from film group by genre asc");

$hitungfilm = $konek->query("SELECT COUNT(id_film) as tot_film from film");
while ($data = $hitungfilm->fetch_assoc()) {
    $jumfilm = $data['tot_film'];
}
$hitungbioskop = $konek->query("SELECT COUNT(id_bioskop) as tot_bioskop from bioskop");
while ($data = $hitungbioskop->fetch_assoc()) {
    $jumbioskop = $data['tot_bioskop'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard &mdash; Dakota</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="dist/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="dist/assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="dist/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="dist/assets/css/style.css">
    <link rel="stylesheet" href="dist/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script> -->
    <!-- /END GA -->
    <script src="node_modules/chart.js/dist/chart.js"></script>
    <script src="Chart.js"></script>
    <link rel="icon" type="image/x-icon" href="logo.png">
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
                        <a href="dashboard.php">Dakota</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="dashboard.php">DKT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu</li>
                        <li class="active"><a class="nav-link" href="dashboard.php" ">
                            <i class=" fas fa-home"></i>
                                <span>Dashboard</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Kelola Data</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="film/datafilm.php">Data Film</a></li>
                                <li><a class="nav-link" href="bioskop/databioskop.php">Data Bioskop</a></li>
                            </ul>
                        </li>
                        <li class="menu-header">Setting</li>
                        <li class="menu"><a class="nav-link" href="inc/action-logout.php" ">
                        <i class=" fas fa-sign-out-alt"></i>
                                <span>Logout</span></a></li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Kategori</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="kategori" width="150" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger">
                                    <i class="fas fa-film"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Film</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        echo $jumfilm ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-building"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total Bioskop</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        echo $jumbioskop ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Film</h4>
                                    <div class="card-header-action">
                                        <a href="film/datafilm.php" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $sql = $konek->query("select * from film where id_film between 1 and 5 ");
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
    <script src="dist/assets/modules/jquery.min.js"></script>
    <script src="dist/assets/modules/popper.js"></script>
    <script src="dist/assets/modules/tooltip.js"></script>
    <script src="dist/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="dist/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="dist/assets/modules/moment.min.js"></script>
    <script src="dist/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="dist/assets/modules/jquery.sparkline.min.js"></script>
    <script src="dist/assets/modules/chart.min.js"></script>
    <script src="dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="dist/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="Chart.js"></script>

    <!-- Page Specific JS File -->
    <script src="dist/assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="dist/assets/js/scripts.js"></script>
    <script src="dist/assets/js/custom.js"></script>

    <script>
        var ctx = document.getElementById('kategori').getContext('2d');
        var kategori = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php while ($label = mysqli_fetch_array($data_film)) {
                                echo '"' . $label['genre'] . '",';
                            } ?>],
                datasets: [{
                    label: "Data Kategori",
                    data: [<?php while ($datagenre = mysqli_fetch_array($genre)) {
                                echo '"' . $datagenre['gnr'] . '",';
                            } ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 206, 86, 2)',
                        'rgba(255,99,132,2)',
                        'rgba(54, 162, 235, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(75, 192, 192, 2)',
                        'rgba(75, 192, 192, 2)',
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>