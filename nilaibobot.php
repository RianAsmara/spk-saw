<!DOCTYPE html>

<html lang="en">
      <?php
    include('koneksi.php');
?>
<head>
  <title>SPK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        <li><a href="vdatasiswa.php">View</a></li>
        <li class="active"><a href="hitungsaw.php">Hitung SAW</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    </div>
    <div class="col-sm-8 text-left"> 
        <h1 class="page-header">
                HITUNG SAW
        </h1>
        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Hitung SAW
                            </li>
        </ol>
          <ul class="nav nav-tabs nav-justified">
                <li><a href="matrikskeputusan.php">Matriks Keputusan</a></li>
                <li class="active"><a href="nilaibobot.php">Nilai Bobot</a></li>
                <li><a href="normalisasi.php">Normalisasi</a></li>
                <li><a href="perangkingan.php">Perangkingan</a></li>
          </ul><br>
              <div class="panel panel-info">
            <div class="panel-heading">
                Data Bobot
            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>UAS</th>
                                        <th>UTS</th>
                                        <th>Nilai Rapot</th>
                                        <th>Nilai Tes Masuk</th>
                                    </tr>
                                </thead>
<?php
$queri="Select * From tb_bobot";
$hasil=mysqli_query ($konek_db,$queri);   
while ($data = mysqli_fetch_array ($hasil)){  
 			echo "      
        			<tr>  
					<td>".$data[0]."</td>  
        			<td>".$data[1]."</td>
                    <td>".$data[2]."</td>
                    <td>".$data[3]."</td>
                    </tr>   
        	";      
			}
 ?> 
                            </table>
            </div>
        </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <a href="https://about.me/faizakmal"><p>Muhammad Faiz Akmal</p></a>
</footer>


</body>
</html>
