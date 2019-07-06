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
  <script src="css/datatables/js/jquery.dataTables.min.js"></script>
  <script src="css/datatables-plugins/dataTables.bootstrap.min.js"></script>
  <script src="css/datatables-responsive/dataTables.responsive.js"></script>
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
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
     <div class="col-sm-2 sidenav">
      <p><a href="vdatasiswa.php"><button type="button" class="btn btn-success btn-block">Data Siswa</button></a></p>
      <p><a href="vdatanilai.php"><button type="button" class="btn btn-success btn-block active">Data Nilai</button></a></p>
      <p><a href="vdatabobot.php"><button type="button" class="btn btn-success btn-block">Data Bobot</button></a></p>
    </div>
    <div class="col-sm-8 text-left"> 
        <h1 class="page-header">
                VIEW DATA <small> NILAI</small>
        </h1>
        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Home</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="vdatasiswa.php">View</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bar-chart-o"></i>Nilai
                            </li>
        </ol>
                <div class="panel panel-info">
            <div class="panel-heading">
                Data Nilai
            </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>NIS</th>
                                        <th>UAS</th>
                                        <th>UTS</th>
                                        <th>Nilai Rapot</th>
                                        <th>Niali Tes Masuk</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
<?php
$queri="Select * From tb_nilai";
$hasil=mysqli_query ($konek_db,$queri);   
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){  
 			$id++; 
 			echo "      
        			<tr>  
        			<td>".$id."</td>
					<td>".$data[0]."</td>  
        			<td>".$data[2]."</td>
                    <td>".$data[3]."</td>
                    <td>".$data[4]."</td>
                    <td>".$data[5]."</td>
                    <td><a href=\"edatanilai.php?id=".$data[0]."\"><i class='glyphicon glyphicon-pencil'></i></a></td>
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
    
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<footer class="container-fluid text-center">
  <a href="https://about.me/faizakmal"><p>Muhammad Faiz Akmal</p></a>
</footer>


</body>
</html>
