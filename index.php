<?php
session_start();

if (isset($_SESSION['adm_session'])){

    //Inicio para visualizacao - para usuarios comuns
    require './views/viewInicioAdm.php';
}
else{

    //Inicio editavel - para administradores
    require './views/viewInicio.php';
}

?>