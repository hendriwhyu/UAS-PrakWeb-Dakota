<?php
include '../inc/koneksi.php';
if (isset($_GET['kode'])) {
    if (!'kode') {
        echo "<script>
        swal('Oops!', 'Data anda gagal dihapus', 'error');</script>";
    } else {
        $sql_hapus = "DELETE FROM bioskop WHERE id_bioskop='" . $_GET['kode'] . "'";
        $query_hapus = mysqli_query($konek, $sql_hapus);    
        header('location:databioskop.php');
    }
}
?>