<?php
include '../inc/koneksi.php';
session_start();
if (isset($_GET['kode'])) {
	$_SESSION['status'] = "hapus";
    if (!'kode') {
        echo "<script>
        swal('Oops!', 'Data anda gagal dihapus', 'error');</script>";
    } else {
        $sql_hapus = "DELETE FROM film WHERE id_film='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($konek, $sql_hapus);
        header('location:datafilm.php');
    }
}
?>
