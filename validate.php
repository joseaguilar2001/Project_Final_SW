<?php
error_reporting(0);
$usuario=$_POST['nameuser'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['nameuser']=$usuario;

$conn = mysqli_connect('localhost',  'root',  '',  'ing_otro') or die(mysqli_error($conn));

$consulta="SELECT*FROM usuario where Username='$usuario' and Password='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);
$_SESSION['Rol'] = $filas['Rol'];
$_SESSION['id'] = $filas['idUsuario'];

if($filas != null){
  
    switch($filas['Rol'])
    {
        case "01":
            header("location:index.php");
            break;
        case "02":
            header("location:index.php");
            break;
        case "03":
            header("location:index.php");
          break;
        case "04":
            header("location:index.php");
          break;
        default:
            header("location:index.php");
            break;
    }
    

}else{
    ?>
    <?php
    include("login.php");

  ?>
  <section>
  <div class="notification">
  <button class="delete"></button>
    <strong>ERROR</strong> El usuario o contraseña ingresado son incorrectos
</div>
  </section>
<script>
  document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    const $notification = $delete.parentNode;

    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});

</script>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conn);
