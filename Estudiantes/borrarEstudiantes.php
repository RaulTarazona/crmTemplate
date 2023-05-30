<?php 

require_once('conectar.php');


$record = new Config();

if(isset($_GET['id'])&& isset($_GET['req'])){
    if($_GET['req']=="delete"){
        $record-> setId($_GET['id']);
        $record-> delete();
        echo "<script>alert('Datos Borrados exitosamente'); document.location='estudiantes.php'</script>";
    }
}





?>

