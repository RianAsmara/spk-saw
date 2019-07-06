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
        <li class="active"><a href="matrikskeputusan.php">Hitung SAW</a></li>
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
                <li><a href="nilaibobot.php">Nilai Bobot</a></li>
                <li class="active"><a href="normalisasi.php">Normalisasi</a></li>
                <li><a href="perangkingan.php">Perangkingan</a></li>
        </ul><br>
        
    <div class="panel panel-info">
      <div class="panel-heading">Matriks Keputusan</div>
      <div class="panel-body">    
          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>UAS</th>
                                        <th>UTS</th>
                                        <th>Nilai Rapot</th>
                                        <th>Nilai Tes Masuk</th>
                                    </tr>
                                </thead>
<?php
    $sql="SELECT NIS,UAS,UTS,nilairapot,nilaitesmasuk FROM tb_nilai";
    $result=mysqli_query($konek_db,$sql);
        while($row=mysqli_fetch_array($result)){
            $NIS            = $row[0];
            $UAS            = $row[1];
            $UTS            = $row[2];
            $nilairapot     = $row[3];
            $nilaitesmasuk  = $row[4]; 
                 echo "      
        			<tr>  
					<td>".$NIS."</td>  
        			<td>".$UAS."</td>
                    <td>".$UTS."</td>
                    <td>".$nilairapot."</td>
                    <td>".$nilaitesmasuk."</td>
                    </tr>   
        	";        
}
            
?>
            
             </table>
        </div>
    </div>
         
         <br>
    <div class="panel panel-info">
      <div class="panel-heading">Nilai MAX</div>
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
        $sql="SELECT MAX(UAS), MAX(UTS), MAX(nilairapot), MAX(nilaitesmasuk)FROM tb_nilai";
        $result=mysqli_query($konek_db,$sql); //row melihat dari sql 
        while($row=mysqli_fetch_array($result)){
            $MaxUAS           =$row[0];
            $MaxUTS           =$row[1];
            $MaxNilairapot    =$row[2];
            $MaxNilaitesmasuk =$row[3];   
        }
           echo "      
        			<tr>  
					<td>".$MaxUAS."</td>  
                    <td>".$MaxUTS."</td>
                    <td>".$MaxNilairapot."</td>
                    <td>".$MaxNilaitesmasuk."</td>
                    </tr>   
        	";        
        
        ?>
            </table>
        </div>
    </div>
        
<div class="panel panel-info">
      <div class="panel-heading">Nilai/Nilai MAX</div>
      <div class="panel-body">        
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>UAS</th>
                                        <th>UTS</th>
                                        <th>Nilai Rapot</th>
                                        <th>Nilai Tes Masuk</th>
                                    </tr>
                                </thead>
<?php
        $sql="SELECT NIS, UAS, UTS, nilairapot, nilaitesmasuk FROM tb_nilai";
        $result=mysqli_query($konek_db,$sql) or die(mysql_error()); //row melihat dari sql 
        while($row = mysqli_fetch_array($result)){
            $NIS          =$row[0];
            $bUAS         =$row[1]/$MaxUAS;
            $bUTS         =$row[2]/$MaxUTS;
            $bRapot       =$row[3]/$MaxNilairapot;
            $bTes         =$row[4]/$MaxNilaitesmasuk;
            echo "      
        			<tr>  
                    <td>".$NIS."</td> 
					<td>".$bUAS."</td>
                    <td>".$bUTS."</td>
                    <td>".$bRapot."</td>
                    <td>".$bTes."</td>
                    </tr>   
        	";        
        
            }
        ?>
        </table>
    </div>
</div>
      </div><br>
  </div>
</div>
<footer class="container-fluid text-center">
  <a href="https://about.me/faizakmal"><p>Muhammad Faiz Akmal</p></a>
</footer>


</body>
</html>
