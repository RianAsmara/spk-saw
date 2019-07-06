<!DOCTYPE html>
<?php
    include('koneksi.php');
?>
<html lang="en">
<head>
  <title>SPK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://services.iperfect.net/js/IP_generalLib.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">SAW</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="idatasiswa.php">Input</a></li>
        <li class="active"><a href="vdatasiswa.php">View</a></li>
        <li><a href="matrikskeputusan.php">Hitung SAW</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="vdatasiswa.php"><button type="button" class="btn btn-success btn-block active">Data Siswa</button></a></p>
      <p><a href="vdatanilai.php"><button type="button" class="btn btn-success btn-block">Data Nilai</button></a></p>
      <p><a href="vdatabobot.php"><button type="button" class="btn btn-success btn-block">Data Bobot</button></a></p>
    </div>
    <div class="col-sm-8 text-left">
        <h1 class="page-header">
                EDIT DATA <small> Siswa</small>
        </h1>
        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="vdatasiswa.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Siswa
                            </li>
        </ol>
        
        
        
    <form name="frm" id="myForm" method="post"  enctype="multipart/form-data">
     <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nis">NIS :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='nis' class='form-control' id='nis' readonly value='".$data[0]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nama">Nama :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='nama' class='form-control' id='nama' value='".$data[1]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="tgllahir">Tanggal Lahir :</label>
				<div class="col-sm-8">
                     <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' id='coldate1' name='tgllahir' class='form-control IP_calendar' alt='date' title='Y/m/d'  value='".$data[2]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="asalsekolah">Asal Sekolah :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='asalsekolah' class='form-control' id='asalsekolah' value='".$data[3]."'><br>";
                    }
                ?>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="notelp">No Telp :</label>
				<div class="col-sm-8">
					 <?php
                       $tampil = "SELECT * FROM tb_siswa where NIS='".$_GET['id']."' ";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                        echo "<input type='text' name='notelp' class='form-control' id='notelp' value='".$data[4]."'><br>";
                    }
                ?>
				</div> 
			</div>   
				        <button type="submit" name ="submit" class="btn btn-success"  onclick="return checkInput()">Simpan</button><br><br>

            <?php		

                    if(isset($_POST['submit'])){
                    $nis                 = $_POST['nis'];
                    $nama                = $_POST['nama'];
                    $tgllahir            = $_POST['tgllahir'];
                    $asalsekolah         = $_POST['asalsekolah'];
                    $notelp              = $_POST['notelp'];
                    $query="UPDATE tb_siswa SET nama='$nama', tgllahir='$tgllahir',asalsekolah='$asalsekolah', notelp='$notelp' WHERE NIS='$nis'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success fade in">
                                <a href="vdatanilai.php" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <strong>Success!</strong> Data Berhasil Diinputkan.
                                </div>;
                            <?php
                                }
 }

                ?>		
        </form></div>
  </div>
</div>
    
<script type="text/javascript"> 
    $(function() { 
        $("#datepicker").datepicker();
    }); 
    function checkInput(){
    return confirm('Data sudah benar ?');
}
</script>

    
<footer class="container-fluid text-center">
  <a href="https://about.me/faizakmal"><p>Muhammad Faiz Akmal</p></a>
</footer>


</body>
</html>
