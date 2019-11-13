<h3>Mencari Volume Kubus dan Luas Kubus dari Rusuk</h3>
 
<p>Masukkan Rusuk</p>
<form action="Jonathan_PHP1.php" method="post">
	Rusuk :<input type="text" name="rusuk"><br>
	<input type="submit" name="submit" value="Hitung">
</form>
 
<?php
if(isset($_POST['submit'])){
	$rusuk= $_POST['rusuk'];

	$volume = $rusuk * $rusuk * $rusuk;
	$luas = $rusuk * $rusuk * 6 ;
	echo "Hasil Konversi <br>";
	echo "Volume : $volume <br>";
	echo "Luas : $luas <br>";

}
?>