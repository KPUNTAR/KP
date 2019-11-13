
<?php
// Create database connection using config file
include_once("config.php");
session_start();

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM kegiatan ORDER BY id_kegiatan ");

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
} else {
    header("Location: home.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}

/* Container for flexboxes */
section {
  display: -webkit-flex;
  display: flex;
}

/* Style the navigation menu */
nav {
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background: #ccc;
  padding: 20px;
}

/* Style the list inside the menu */
nav ul {
  list-style-type: none;
  padding: 0;
}

/* Style the content */
article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: #f1f1f1;
  padding: 10px;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .login-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
  width:120px;
}

.topnav .login-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background-color: #555;
  color: white;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .login-container button:hover {
  background-color: green;
}

@media screen and (max-width: 600px) {
  .topnav .login-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .login-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<body>

<?php
//Echo session variables that were set on previous page
//echo "Welcome, " . $name . ".";
?>

<div class="topnav">
  <a href="http://localhost/homeloginadmin.php#">Home</a>
  <a class="active" href="/kegiatan.php">Jadwal Kegiatan</a>
  <a href="#contact">Search</a>
    <div class="login-container">
    <form action="/home.php">
  <button type="submit" onclick="return check(this.form)" >Logout</button>
 </form>
        </div>
</div>

</body>

<script language="javascript">
function check(form)
{
	return true;
}
</script>

<header>
  <h2>Universitas Tarumanagara</h2>
</header>

<section>
  <nav>
    <ul>
      <li><a href="http://localhost/home.php#">Home</a></li>
      <li><a href="http://localhost/kegiatan.php#">Jadwal Kegiatan</a></li>
      <li><a href="#">Search</a></li>
    </ul>
  </nav>
  
  <article>
    <a href="add_kegiatan.php" class="add">Add Kegiatan</a><br/><br/>

    <table width='50%' border=2>
	
	 <tr>
        <th>Nama Kegiatan</th> <th>Ada Divisi?</th>  <th> Change Table </th>
    </tr>
    <?php  
    while($data = mysqli_fetch_array($result)) {         
        echo "<tr>";
		if ($data['cek_divisi']=='0'){
		echo "<td><a href='divisi.php?id_kegiatan=$data[id_kegiatan]'>".$data['nama_kegiatan']."</td>";
		}
		else {
			echo "<td><a href='tahun_2.php?id_kegiatan=$data[id_kegiatan]'>".$data['nama_kegiatan']."</td>";
		}
		 echo "<td>".$data['cek_divisi']."</td>";
        echo "<td><a href='edit_kegiatan.php?id_kegiatan=$data[id_kegiatan]'>Edit</a> | <a href='delete.php?id_kegiatan=$data[id_kegiatan]'>Delete</a>  </td></tr>";        
    }
    ?>
    </table>
    <p></p>
  </article>
</section>

<footer>
  <p></p>
</footer>

</body>
</html>
