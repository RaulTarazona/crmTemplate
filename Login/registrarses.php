<?php 
if(isset($_POST['registrarse'])){

    require_once('registroUser.php');

    $register = new User();

    $register->setIdCamper(15);
    $register->setEmail($_POST['email']);
    $register->setUsername($_POST['username']);
    $register->setPassword($_POST['password']);

    $register->insertData();

    echo"<script>alert('Los datos fueron Guardados satisfactoriamente');document.location='loginRegister.php'</script>";
}



?>