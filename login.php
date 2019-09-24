<?php
ob_start();
include 'db-mysqli.php';
include 'loginForm.php';

if (isset($_REQUEST['login'])){
$user= $_POST['user'];
$pass=$_POST['pass'];

echo('isset login');
$consulta="SELECT * FROM  usuario WHERE user='$user' and pass= $pass";

$sentencia = $db->query($consulta);

$row=mysqli_fetch_array($sentencia) or die (mysqli_error($db));
if ($row['user']){

header("location: menu.html", true, 301);
echo("hola");
}else {
    header("location: loginForm.php", true, 301);
    echo("adios");
    exit();
}
}



?>