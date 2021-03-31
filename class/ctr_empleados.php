<?php 
require_once('atrib/conect.php');



class Empleados{

    function create($nombre,$email,$sexo,$area,$boletin,$descripcion){
        $conexion = new Conect();

        $sql = "INSERT INTO empleados(id,nombre,email,sexo,area_id,boletin,descripcion) VALUE ('','$nombre','$email','$sexo','$area','$boletin','$descripcion')";

        try {
            $make = $conexion->prepare($sql);
            $make->execute();

            echo "<script>alert('Empleado Creado con exito');
            
            </script>";
            
            
        } catch (PDOException $e) {
            echo "Error Agregando Usuario. Detalle: ".$e->getMessage();
        }


        

    }

    function listaEmpleados(){

        $conexion = new Conect();

        $sql = "SELECT empleados.id,empleados.nombre,email,(CASE WHEN sexo = 'F' THEN 'Femenino'
        WHEN sexo = 'M' THEN 'Masculino' END) as sexo,areas.nombre as area,(CASE WHEN boletin = '1' THEN 'SI'
        WHEN boletin = '0' THEN 'NO' END) as boletin FROM empleados INNER JOIN areas ON empleados.area_id=areas.id";

        try {
            $make = $conexion->prepare($sql);
            $make->execute();

            while ($row=$make->fetch()){
                $id = $row['id'];
                $nombre = $row['nombre'];
                $email = $row['email'];
                $sexo = $row['sexo'];
                $area = $row['area'];
                $boletin = $row['boletin'];
                $datos = '
                <tr>
                    <td>'.$nombre.'</td>
                    <td>'.$email.'</td>
                    <td>'.$sexo.'</td>
                    <td>'.$area.'</td>
                    <td>'.$boletin.'</td>
                    <td><a href="editar?u='.$id.'">Editar</a></td>
                    <td><a href="eliminar?u='.$id.'">Eliminar</a></td>
                </tr>
                ';

                echo $datos;
            }

        } catch (PDOException $e) {
            echo "Error al realizar la consulta. Detalle del error: ".$e->getMessage();
        }


    }

    function update(){

    }

    function delete($user){
        $conexion = new Conect();
        $sql = "DELETE FROM empleados WHERE empleados.id = '$user'";

        try {
            $make = $conexion->prepare($sql);
            $make->execute();
        } catch (PDOException $e) {
            echo "Error al realizar la consulta. Detalle del error: ".$e->getMessage();
        }
    }
}
?>
