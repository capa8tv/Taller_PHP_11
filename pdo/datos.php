<?php
//namespace User;
require_once("conectar.php");
//use Capa8\Conectar;
class Datos extends Conectar
{
    private $con;
    public function __construct()
    {
        $this->con=parent::con();
        //acá le informamos a PHP que el cotejamiento es UTF8
        parent::setNames();
    }
    public function getUsuarios()
    {
        $sql="select id,nombre,correo,fecha_nacimiento,pass from usuarios;";
        //el método prepare retorna un objeto que tiene sus propios métodos
        $datos=$this->con->prepare($sql);
        //el execute ejecuta la consulta SQL
        $datos->execute();
        //el fetchAll toma los datos, los pone un array es bidimensional
        return $datos->fetchAll();
    }
    public function getUsuariosPorId($id)
    {
        $sql="select id,nombre,correo,fecha_nacimiento,pass from usuarios where id = ?;";
        //echo $sql;exit;
        $datos=$this->con->prepare($sql);
        //$datos->bindValue(1,$id,PDO::PARAM_INT);
        $datos->bindParam(1,$id,PDO::PARAM_INT);
        //$datos->execute(array($id));
        $datos->execute();
        return $datos->fetchAll();
    }
    public function insertarDatos()
    {
        $sql="insert into usuarios 
                values
                (null,?,?,?,?);";
        $datos=$this->con->prepare($sql);
        $datos->bindParam(1,$_POST["nom"],PDO::PARAM_STR);
        $datos->bindParam(2,$_POST["correo"],PDO::PARAM_STR);
        $datos->bindParam(3,$_POST["fecha"],PDO::PARAM_STR);
        $datos->bindParam(4,sha1($_POST["pass"]),PDO::PARAM_STR);
        $datos->execute();
        return $this->con->lastInsertId();
    }
    public function eliminar()
    {
        $sql="delete from usuarios 
             where
             id=?
            ";
        $datos=$this->con->prepare($sql);
        $datos->bindParam(1,$_GET["id"],PDO::PARAM_INT);  
        $datos->execute();  
    }
    public function update()
    {
        if(empty($_POST["pass"]))
        {
             $sql="update usuarios 
                set
                nombre=?,
                correo=?,
                fecha_nacimiento=?
                where
                id=?";
             $datos=$this->con->prepare($sql);
             $datos->bindParam(1,$_POST["nom"],PDO::PARAM_STR);
             $datos->bindParam(2,$_POST["correo"],PDO::PARAM_STR);
             $datos->bindParam(3,$_POST["fecha"],PDO::PARAM_STR);
             $datos->bindParam(4,$_POST["id"],PDO::PARAM_INT);
        }else
        {
             $sql="update usuarios 
                set
                nombre=?,
                correo=?,
                fecha_nacimiento=?,
                pass=?
                where
                id=?";
             $datos=$this->con->prepare($sql);
             $datos=$this->con->prepare($sql);
             $datos->bindParam(1,$_POST["nom"],PDO::PARAM_STR);
             $datos->bindParam(2,$_POST["correo"],PDO::PARAM_STR);
             $datos->bindParam(3,$_POST["fecha"],PDO::PARAM_STR);
             $datos->bindParam(4,sha1($_POST["pass"]),PDO::PARAM_STR);
             $datos->bindParam(5,$_POST["id"],PDO::PARAM_INT);
        }
         $datos->execute();
       
                
    }
    public function cerrar()
    {
        //acá le decimos que el atributo ya no es instancia de PDO
        return $this->con=null;
    }
    
}
