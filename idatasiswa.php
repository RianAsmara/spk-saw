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
        <li class="active"><a href="idatasiswa.php">Input</a></li>
        <li><a href="vdatasiswa.php">View</a></li>
        <li><a href="matrikskeputusan.php">Hitung SAW</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="idatasiswa.php"><button type="button" class="btn btn-success btn-block active">Data Siswa</button></a></p>
      <p><a href="idatanilai.php"><button type="button" class="btn btn-success btn-block">Data Nilai</button></a></p>
      <p><a href="idatabobot.php"><button type="button" class="btn btn-success btn-block">Data Bobot</button></a></p>
    </div>
    <div class="col-sm-8 text-left">
    <?php 
        $carikode = mysqli_query($konek_db, "select max(NIS) from tb_siswa");
        $datakode = mysqli_fetch_array($carikode);
        if ($datakode) {
        $nilaikode = substr($datakode[0], 1);
        $kode = (int) $nilaikode;
        $kode = $kode + 1;
        $hasilkode = "S".str_pad($kode, 3, "0", STR_PAD_LEFT);
        } 
    else {
        $hasilkode = "S001";
    }

 ?>
        <h1 class="page-header">
                INPUT DATA <small> Siswa</small>
        </h1>
        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="idatasiswa.php">Input</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Siswa
                            </li>
        </ol>
        
        
        
    <form name="frm" id="myForm" method="post"  enctype="multipart/form-data">
     <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nis">NIS :</label>
				<div class="col-sm-8">
					<input type="text" name="nis" class="form-control" required name="id" data-error="Isi kolom dengan benar" value="<?php echo $hasilkode; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="nama">Nama :</label>
				<div class="col-sm-8">
					<input type="text" name="nama" class="form-control" required name="nama" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="tgllahir">Tanggal Lahir :</label>
				<div class="col-sm-8">
					 <input type="text" id="coldate1" name="tgllahir" class="form-control IP_calendar" alt="date" title="Y/m/d"><br>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="asalsekolah">Asal Sekolah :</label>
				<div class="col-sm-8">
					<input type="text" name="asalsekolah" class="form-control" data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
				</div> 
			</div>
        <div class="form-group has-feedback">
         <label class="control-label col-sm-3" for="notelp">No Telp :</label>
				<div class="col-sm-8">
					<input type="text" name="notelp" class="form-control" required data-error="Isi kolom dengan benar">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors" role="alert"></div>
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
                    $query="INSERT INTO tb_siswa SET NIS='$nis', nama='$nama', tgllahir='$tgllahir',asalsekolah='$asalsekolah', notelp='$notelp'";
                    $result=mysqli_query($konek_db, $query);
                        if($result){
                            ?>
                            <div class="alert alert-success fade in">
                                <a href="idatanilai.php" class="close" data-dismiss="alert" aria-label="close">×</a>
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
