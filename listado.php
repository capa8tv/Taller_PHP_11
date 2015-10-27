<?php
require_once("pdo/datos.php");
//use User\Datos;
$d=new Datos();

$datos=$d->getUsuarios();
$d->cerrar();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" /> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" /> 
         <script type="text/javascript" src="js/funciones.js"></script> 
    </head>
    <body>
       
        <div class="container">
            <div class="row">
                <?php
                if(isset($_GET["m"]))
                {
                    switch($_GET["m"])
                    {
                        case '1':
                            ?>
                            <span class="label label-success">Se han agregado los datos exitosamente ñandú</span>
                            <?php
                        break;
                         case '2':
                            ?>
                            <span class="label label-success">Se han editado los datos exitosamente ñandú</span>
                            <?php
                        break;
                         case '3':
                            ?>
                            <span class="label label-success">Se han eliminado los datos exitosamente ñandú</span>
                            <?php
                        break;
                    }
                    
                }
                ?>
                <h1>Listado de Usuarios</h1>
                <p>
                    <a href="add.php" class="btn btn-success">Agregar</a>
                </p>
                
            <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>E-Mail</th>
                <th>Fecha Nacimiento</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <?php
                //for($i=0;$i<sizeof($datos);$i++)
                foreach($datos as $dato)
                {
                    ?>
                    <tr>
                        <td><?php echo $dato["id"]?></td>
                        <td><?php echo $dato["nombre"]?></td>
                        <td><?php echo $dato["correo"]?></td>
                        <td><?php echo $dato["fecha_nacimiento"]?></td>
                        <td><?php echo $dato["pass"]?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $dato["id"]?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                            <a href="javascript:void(0);" onclick="eliminar('eliminar.php?id=<?php echo $dato["id"]?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
            </div>
        </div>
        
    </body>
</html>
<?php 

?>
