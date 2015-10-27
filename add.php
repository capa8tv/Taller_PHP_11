<?php
require_once("pdo/datos.php");
//use User\Datos;
$d=new Datos();
if(isset($_POST["tokem"]))
{
   //print_r($_POST);
   $mensaje="";
   if(filter_var( trim($_POST["nom"]) )==false)
    {
        $mensaje.="El nombre está vacío<br />";
    }
    if(filter_var($_POST["correo"],FILTER_VALIDATE_EMAIL)==false)
    {
        $mensaje.="El E-Mail ingresado no es válido<br />";
    }
    if(filter_var( trim($_POST["pass"]) )==false)
    {
        $mensaje.="La contraseña esta vacía<br />";
    }
    if($mensaje!="")
    {
        ?>
        <!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"  />        
    </head>
    <body>
        <h3><?php echo $mensaje?></h3>
    </body>
</html>
        <?php
    }else
    {
       $id=$d->insertarDatos();
       header("Location: listado.php?m=1&id=".$id); 
    }
   exit; 
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />   
    </head>
    <body>
       
        <div class="container">
            <div class="row">
            <ol class="breadcrumb">
              <li><a href="listado.php">Listado</a></li>
              <li class="active">Agregar Usuario</li>
            </ol>
                <h1>Agregar Usuario</h1>
                 <form name="form" action="" method="post">
                    <div class="form-group">
                        <label for="nom">Nombre</label>
                        <input type="text" class="form-control"  placeholder="Nombre:" name="nom" />
                    </div>
                    <div class="form-group">
                        <label for="correo">E-Mail</label>
                        <input type="email" class="form-control"  placeholder="E-Mail:" name="correo" />
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" name="fecha" />
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control"  placeholder="Contraseña:" name="pass" />
                    </div>
                    <input type="hidden" name="tokem" />
                    <button type="submit" class="btn btn-default">Enviar</button>
                 </form>
            </div>
        </div>
    </body>
</html>
<?php 

?>
