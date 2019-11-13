<h3>Mengeluarkan Random Password dengan Permutasi Data</h3>
 
<p>Masukkan Panjang Password</p>
<form action="Jonathan_PHP2.php" method="post">
	Panjang Password :<input type="text" name="panjang"><br><br>
	<p>Masukkan Data Password</p>
	Data :<input type="text" name="data"><br><br>
	
	<input type="submit" name="submit" value="Default Data"><br><br>
	<input type="submit" name="custom" value="Custom Data"><br>
	
</form>
 
<?php

function password_default($chars) 
{
  $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
  return substr(str_shuffle($data), 0, $chars);
}

function password_custom($chars) 
{
  $data = $_POST ['data'];
  return substr(str_shuffle($data), 0, $chars);
}


if(isset($_POST['submit'])){
	$panjang= $_POST['panjang'];
	echo "Password :";
	  echo password_default($panjang)."\n";
}

if(isset($_POST['custom'])){
	$panjang= $_POST['panjang'];
	echo "Password :";
	  echo password_custom($panjang)."\n";
}
?>
