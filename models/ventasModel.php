<?php


class ventasModel{

    private $db; //variable para almacenar la conexion a la base de datos

    public function __construct(){
        require_once("c:/xampp/htdocs/iboss/config/db.php"); 
        $objdb = new db();
        $this->db = $objdb->conexion(); 
    }

    public function obtenerVentas(){//metodo para obtener todas las ventas
        //La consulta suma los productos vendidos por id_venta y si no hay productos vendidos relacionados con ese ID, devuelve 0.
        $statement = $this->db->prepare("
            SELECT v.id_venta,  v.total, v.total_con_desc, v.descuento,
                COALESCE(SUM(dv.cantidad), 0) AS cant_productos, 
                v.fecha_venta as fecha
            FROM ventas v
            LEFT JOIN detalles_ventas dv ON v.id_venta = dv.id_venta
            GROUP BY v.id_venta;
        ");
        //error en el return
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    //actualiza el total de la venta cuando se aplica un descuento
    public function actualizarVenta($id_venta, $descuento, $totalConDesc) {
        $statement = $this->db->prepare("
            UPDATE ventas
            SET descuento = :descuento,
                total_con_desc = :totalConDesc
            WHERE id_venta = :id_venta
        ");
        $statement->bindParam(':id_venta', $id_venta);
        $statement->bindParam(':descuento', $descuento);
        $statement->bindParam(':totalConDesc', $totalConDesc);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //sirve para agregar productos a la venta
    public function obtenerProductos() {
        $statement = $this->db->prepare("SELECT id_producto, nombre as producto FROM productos");
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;
    }

    public function agregarVenta() {
        //el total de la venta se inicializa en 0 porque la venta se crea automaticamente antes de agregarle detalles
        $statement = $this->db->prepare("
            INSERT INTO ventas (total, descuento, total_con_desc) 
            VALUES (0, 0, 0)
        ");
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminarVentas($id_venta) { //funcion para eliminar una venta
        $statement = $this->db->prepare("
            DELETE FROM ventas
            WHERE id_venta = :id_venta
        ");// preparamos la consulta o query
        $statement->bindParam(':id_venta', $id_venta); // pasamos los parametros
        try {
            $statement->execute();//ejecutamos la consulta
            return true;//retornamos verdadero si se ejecuto correctamente
        } catch (Exception $e) {
            return false;//retornamos falso si hubo un error
        }
    }

    //BUSQUEDA DE VENTAS POR FECHA
    public function buscarVentas($fecha) {
        // Define el rango completo del día
        $fecha_inicio = $fecha . ' 00:00:00';
        $fecha_fin = $fecha . ' 23:59:59';

        $statement = $this->db->prepare("
            SELECT v.id_venta, v.total, v.total_con_desc, v.descuento,
                    COALESCE(SUM(dv.cantidad), 0) AS cant_productos,
                    v.fecha_venta as fecha
            FROM ventas v
            INNER JOIN detalles_ventas dv ON v.id_venta = dv.id_venta
            WHERE v.fecha_venta BETWEEN :inicio AND :fin
            GROUP BY v.id_venta
        ");
        $statement->bindParam(':inicio', $fecha_inicio);
        $statement->bindParam(':fin', $fecha_fin);

        if (!$statement->execute()) {
            var_dump($statement->errorInfo()); // para ver errores de SQL si los hay
            return false;
        }

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }



    /*
    * Obtener el ID de la ultima venta agregada a la base de datos.
    * Para utilizarlo en la vista de detalles de la venta.
    */
    public function obtenerUltimoIdVenta() {
        // La consulta utiliza la función MAX para obtener el ID máximo de la tabla ventas.
        //Se retorna el ID de la última venta o 0 si no hay registros.
        $consulta = "SELECT MAX(id_venta) AS ultimo_id FROM ventas";
        $resultado = $this->db->query($consulta); 
        // Obtener el resultado
        $fila = $resultado->fetch(PDO::FETCH_ASSOC);
        
        // Si no hay registros, asignar 0 como el ID del último producto
        $ultimoId = $fila['ultimo_id'] ? $fila['ultimo_id'] : 0;
        
        // Retornar el ID del último producto
        return $ultimoId;
    }

    //actualizar el total de una venta cuando se agregue un producto relacionado a la venta
    public function actualizarTotalVentas($id_venta){
        $statement = $this->db->prepare("
            UPDATE ventas
            SET total = (SELECT SUM(subtotal) FROM detalles_ventas WHERE id_venta = :id_venta),
                total_con_desc = (SELECT SUM(subtotal) FROM detalles_ventas WHERE id_venta = :id_venta) - descuento
            WHERE id_venta = :id_venta
        ");
        $statement->bindParam(':id_venta', $id_venta);
        try {
            $statement->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    //me sirve para obtener y mostrar el total real y actualizado de la venta en la vista de detalles de la venta
    public function obtenerTotalVenta($id_venta) {
        $statement = $this->db->prepare("
            SELECT total FROM ventas WHERE id_venta = :id_venta
        ");
        $statement->bindParam(':id_venta', $id_venta);
        if ($statement->execute()) {
            $resultado = $statement->fetch(PDO::FETCH_ASSOC); // traer solo una fila en formato de array asociativo
            // Si no hay registros, asignar 0 como el total de la venta
            return $resultado ? $resultado['total'] : 0; // devuelve solo el total
        } else {
            return 0;
        }
    }

    public function obtenerVentaPorId($id_venta) {
        $statement = $this->db->prepare("
            SELECT id_venta, total, total_con_desc, descuento
            FROM ventas
            WHERE id_venta = :id
        ");
        $statement->bindParam(':id', $id_venta, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC); // solo una venta
    }
    

}
?>