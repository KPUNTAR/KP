<?php
// Create database connection using config file
include_once("config.php");
session_start();
$_SESSION['loggedin'] = FALSE;

// Fetch all users data from database
//$result = mysqli_query($mysqli, "SELECT * FROM accounts ORDER BY id DESC");

if(isset($_POST['username'])){
    
    $uname=$_POST['username'];
    $pword=$_POST['password'];

    $result = mysqli_query($mysqli,"SELECT * FROM accounts where username='".$uname."' AND password='".$pword."' limit 1");
    $result2 = mysqli_query($mysqli,"SELECT * FROM mahasiswa where NIM='".$uname."' AND password='".$pword."' limit 1");

    if(mysqli_num_rows($result)==1){
        while($row = $result->fetch_assoc()) {
        if($row["privilege"] == 1){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            header("Location: homelogin1.php");
            exit();
        }
        elseif($row["privilege"] == 2){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            header("Location: homeloginadmin.php");
            exit();
        }
        elseif($row["privilege"] == 3){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            header("Location: homeloginrektor.php");
            exit();
        }
       }
    }
    else if(mysqli_num_rows($result2)==1){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $uname;
            header("Location: homeloginsiswa.php");
            exit();
    }
    else{
        alert("Error Password or Username");
    }
}
//$query = mysqli_query("SELECT * FROM account WHERE username='$username' AND password='$password'");

/*$count=mysqli_num_rows($result);

if($count==1){
    $row = mysqli_fetch_assoc($result);
    if (crypt($password, $row['password']) == $row['password']){
        session_register("username");
        session_register("password"); 
        echo "Login Successful";
        return true;
    }
    else {
        echo "Wrong Username or Password";
        return false;
    }
}
else{
    echo "Wrong Username or Password";
    return false;
}*/


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
  padding: 10px;
  text-align: center;
  font-size: 24px;
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="#home">Home</a>

  <div class="login-container">
    <form method="POST" action="#">
      <input type="text" placeholder="username" name="username">
      <input type="text" placeholder="password" name="password">
      <button type="submit" name="Login" value="LOGIN" class="btn-login" >Login</button>
    </form>

<?
//onclick="return check(this.form)
//Set session variables
//$_SESSION['username'] = "admin";

if(isset($_POST['Login'])) {
    //$name = $_POST['username'];
    

        // include database connection file
    //include_once("config.php");

        // Insert user data into table
    //$result = mysqli_query($mysqli, "INSERT INTO kegiatan(nama) VALUES('$name')");
    }
?>

  </div>

</div>
</body>

<script language="javascript">
   /* function check(form) {

        if (form.username.value == "admin" && form.pwd.value == "admin") {
            header("Location: homelogin1.php");
            exit;
        }
        if (form.username.value == "rektor" && form.pwd.value == "rektor") {
            header("Location: homeloginrektor.php");
            exit;
        }
        else {
            alert("Error Password or Username")
            return false;
        }
    }
</script>

<header>
  <h2>Universitas Tarumanagara</h2>
</header>

<section>
  
  <article>
    <h1></h1>
    <div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 2</div>
  <img src="untar.png" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 2</div>
  <img src="untar2.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 2 seconds
}
</script>


        <table width='80%' border=1>
     
    <?php  
    /*while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['username']."</td>";
        echo "<td>".$user_data['email']."</td>";   
        echo "<td>".$user_data['password']."</td>";   
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a> | <a href='select.php?id=$user_data[id]'>Select</a> </td></tr>";        
    }*/
    ?>
    </table>
  </article>
</section>

<footer>
  <p></p>
</footer>

</body>
</html>
