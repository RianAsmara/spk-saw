<?php
include('koneksi.php');
$query="DELETE from tb_siswa where NIS='".$_GET['id']."'";
mysqli_query($konek_db, $query);
header("location:vdatasiswa.php");
?>