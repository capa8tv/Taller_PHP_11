<?php
if(isset($_GET["id"]) and is_numeric($_GET["id"]) and !empty($_GET["id"]))
{
    require_once("pdo/datos.php");
    $d=new Datos();
    $d->eliminar();
     header("Location: listado.php?m=3");
}else
{
    header("Location: listado.php");
}
