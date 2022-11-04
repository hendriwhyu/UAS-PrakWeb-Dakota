<?php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($konek,"SELECT * FROM pengguna where username='$username' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:../dashboard.php");
} else {
	header("location:../index.php");
	echo "<script>
        swal({title: 'Gagal Login',text: 'Username / Password anda salah',icon: 'error',confirmButtonText: 'OK'
        }).then((result) => {if (result.value){
            window.location = '../index.php';
            }
        })</script>";
}
