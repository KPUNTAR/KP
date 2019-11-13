<?php
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM mahasiswa ORDER BY NIM ");

$result2 = mysqli_query($mysqli, "SELECT * FROM prodi ORDER BY id_prodi ");

?>

<html>
<head>    
    <title>Homepage</title>
	<style>
body {
 background-image: url("paper.gif");
 background-color: #cccccc;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 5px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #ffffff}

th {
  background-color: #4CAF50;
  color: white;
}

.add{
	background-color:#ffffff;
	border: 2px solid Black;
	font-size: 20px;
}

	</style>
</head>

<body> 

<a href="add_mhs.php" class="add">Add Mahasiswa</a><br/><br/>

    <table width='100%' border=2>
	
	 <tr>
     <th>NIM</th>   <th>Nama Mahasiswa</th> <th> Fakultas & Prodi </th> <th> E-Mail </th>  <th> Change Table </th>
    </tr>
    <?php  
    while($data = mysqli_fetch_array($result)) {         
        echo "<tr>";
		
		echo "<td>".$data['NIM']."</td>";
        echo "<td>".$data['nama_mhs']."</td>";
		 echo "<td>".$data['nama_prodi']."</td>";
		echo "<td>".$data['email_mhs']."</td>";
		
        echo "<td><a href='edit_mhs.php?NIM=$data[NIM]'>Edit</a> | <a href='delete_mhs.php?NIM=$data[NIM]'>Delete</a>  </td></tr>";        
    }
    ?>
    </table>
</body>
</html>