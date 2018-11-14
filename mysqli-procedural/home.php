<?php
session_start();
include "koneksi.php";

  if(!isset($_SESSION['username'])){
    header("location:index.php");
    exit();
  }else{
    $username = $_SESSION['username'];
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title> CRUD </title>
	<link rel="stylesheet" href="style/bootstrap.min.css" />
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<p>
					<center>
						<h2>CRUD Sederhana</h2>
					</center>
				</p>
				<br>
				<p>
				<a href="logout(prosedur).php" class="btn btn-primary"> logout </a>
				<a href="tambah.php" class="btn btn-primary"> Tambah Data </a>
				</p>
				<table class="table table-bordered">
					<tr>
						<th>NIM</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
						<?php
							include('koneksi.php');
							$hasil = mysqli_query($conn, "select * from mahasiswa");
							while ($baris = mysqli_fetch_array($hasil)) {
								echo "<tr>";
								echo "<td> $baris[1] </td>";
								echo "<td> $baris[0] </td>";
								echo "<td> $baris[2] </td>";
								echo "<td><a href='detail.php?id=$baris[1];'>Detail</a> | <a href='edit.php?id=$baris[1];'>Edit</a> | <a href='hapus.php?id=$baris[1];'>Hapus</a></td>";
								echo "</tr>";	
							}
						?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>

