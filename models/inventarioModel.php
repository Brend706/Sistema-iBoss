<?php

class inventarioModel{
    private $conexion;//variable para almacenar la conexion a la base de datos
    public function __construct(){//constructor
        require_once("c://xampp/htdocs/iboss/config/db.php");//llamado a la conexion
        $conexiondb = new db();//instanciamos la conexion
        $this->conexion = $conexiondb->conexion();//obtenemos la conexion
    }
    
    public function obtenerExistencias(){//metodo para obtener las existencias
        //ordenar por fecha de actualizacion
        $sql = "SELECT e.id_existencia, p.nombre as producto, e.cantidad as existencia, e.fecha_actualizacion as actualizacion FROM existencias e INNER JOIN productos p ON e.id_producto = p.id_producto ORDER BY e.fecha_actualizacion DESC";//consulta sql
        $resultado = $this->conexion->prepare($sql);//ejecutamos la consulta
        $resultado->execute();//ejecutamos la consulta
        $existencias = $resultado->fetchAll(PDO::FETCH_ASSOC);//obtenemos el resultado
        return $existencias;//retornamos el resultado
    }
    
    public function agregarExistencia($id_producto, $existencia) {
        //metodo para agregar las existencias de un producto
        $sql = "INSERT INTO existencias (id_producto, cantidad) VALUES (:id_producto, :cantidad)";//consulta sql
        $stmt = $this->conexion->prepare($sql);//preparamos la consulta
        $stmt->bindParam(':id_producto', $id_producto);//vinculamos los parametros
        $stmt->bindParam(':cantidad', $existencia);//vinculamos los parametros

        try {
            $stmt->execute();//ejecutamos la consulta
            return true;//retornamos verdadero si se ejecuto correctamente
        } catch (PDOException $e) {
            return false;//retornamos falso si no se ejecuto correctamente
        }
    }

    public function actualizarExistencia($id_existencia, $existencia) {//metodo para actualizar una existencia
        $sql = "UPDATE existencias SET cantidad = :cantidad WHERE id_existencia = :id";//consulta sql
        $stmt = $this->conexion->prepare($sql);//preparamos la consulta
        $stmt->bindParam(':cantidad', $existencia);//vinculamos los parametros
        $stmt->bindParam(':id', $id_existencia);//vinculamos los parametros
        try {
            $stmt->execute();//ejecutamos la consulta
            return true;//retornamos verdadero si se ejecuto correctamente
        } catch (PDOException $e) {
            return false;//retornamos falso si no se ejecuto correctamente
        }
    }

    public function eliminarExistencia($id_existencia) {//metodo para eliminar una existencia
        $sql = "DELETE FROM existencias WHERE id_existencia = :id_existencia";//consulta sql
        $stmt = $this->conexion->prepare($sql);//preparamos la consulta
        $stmt->bindParam(':id_existencia', $id_existencia);
        try{
            $stmt->execute();
            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
    
    //metodo para buscar un producto por su nombre
    public function buscarProductoInv($texto) {
        $sql = "SELECT e.id_existencia, p.nombre as producto, e.cantidad as existencia, e.fecha_actualizacion as actualizacion FROM existencias e INNER JOIN productos p ON e.id_producto = p.id_producto WHERE p.nombre LIKE :texto ORDER BY e.fecha_actualizacion DESC";
        $stmt = $this->conexion->prepare($sql);
        $texto = "%$texto%";//agregamos los signos de porcentaje para buscar por nombre
        $stmt->bindParam(':texto', $texto);//vinculamos el parametro
        $stmt->execute();//ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//retornamos el resultado
    }

    //obtener todos los productos
    public function obtenerProductos() {
        $sql = "SELECT id_producto, nombre FROM productos";//consulta sql
        $stmt = $this->conexion->prepare($sql);//preparamos la consulta
        $stmt->execute();//ejecutamos la consulta
        return $stmt->fetchAll(PDO::FETCH_ASSOC);//retornamos el resultado
    }
}
?>