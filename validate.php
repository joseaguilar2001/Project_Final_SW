<?php
error_reporting(0);
$usuario=$_POST['nameuser'];
$contraseña=$_POST['password'];
session_start();
$_SESSION['nameuser']=$usuario;

$conn = mysqli_connect('localhost',  'root',  '',  'prueba_nueva') or die(mysqli_error($conn));

$consulta="SELECT*FROM usuario where Username='$usuario' and Password='$contraseña'";
$resultado=mysqli_query($conn,$consulta);

$filas=mysqli_fetch_array($resultado);
$_SESSION['Rol'] = $filas['Rol'];
$_SESSION['id'] = $filas['idUsuario'];

if($filas != null){
  
  session_start();
      $_SESSION['auth'] = true;
      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
      header('location:index.php');
      echo "En session";
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
