<?php 
if(isset($_POST['registrarse'])){

    require_once('registroUser.php');

    $register = new User();

    $register->setIdCamper(15);
    $register->setEmail($_POST['email']);
    $register->setUsername($_POST['username']);
    $register->setPassword($_POST['password']);

    if($register->checkUSer($_POST['email'])){
        echo"<script>alert('Ya esta creado');document.location='loginRegister.php'</script>";
    }else {
        $register->insertData();
        echo"<script>alert('Los datos fueron Guardados satisfactoriamente');document.location='../Home/home.php'</script>";
    }
    
}



?>