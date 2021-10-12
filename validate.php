<?php
$usuario=$_POST['nameuser'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['nameuser']=$usuario;

$conn = mysqli_connect('localhost',  'root',  '',  'ing_otro') or die(mysqli_error($conn));

$consulta="SELECT*FROM usuario where Username='$usuario' and Password='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);
$_SESSION['Rol'] = $filas['Rol'];

if($filas != null){
  
    switch($filas['Rol'])
    {
        case "01":
            header("location:index.php");
            break;
        case "02":
            header("location:data/");
            break;
        default:
            header("location:data/");
            break;
    }
    

}else{
    ?>
    <?php
    include("login.php");

  ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error al autenticar datos</strong> Porfavor verifica que todos los campos esten en orden
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conn);