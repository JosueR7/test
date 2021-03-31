<?php 
require_once('atrib/conect.php');


class Opciones{
    function listarAreas(){
        $conexion = new Conect();

        $sql = "SELECT * FROM areas";

        try {
            $make = $conexion->prepare($sql);
            $make->execute();

            while ($row=$make->fetch()){
                $id = $row['id'];
                $nombre = $row['nombre'];
                $datos = '
                <option value="'.$id.'">'.$nombre.'</option>';

                echo $datos;
            }

        } catch (PDOException $e) {
            echo "Error al realizar la consulta. Detalle del error: ".$e->getMessage();
        }

    }

    function listarRoles(){
        $conexion = new Conect();

        $sql = "SELECT * FROM roles";

        try {
            $make = $conexion->prepare($sql);
            $make->execute();

            while ($row=$make->fetch()){
                $id = $row['id'];
                $nombre = $row['nombre'];
                $datos = '<div class="custom-control custom-radio">
                    <input id="rol'.$id.'" value="'.$id.'" name="rol" type="checkbox" class="form-check-input">
                    <label class="custom-control-label" for="rol'.$id.'">'.$nombre.'</label>
              </div>';

                echo $datos;
            }

        } catch (PDOException $e) {
            echo "Error al realizar la consulta. Detalle del error: ".$e->getMessage();
        }
    }
}
 ?>