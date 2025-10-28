<?php

class detallesVentasModel{

    private $db;
    public function __construct(){
        require_once("c:/xampp/htdocs/iboss/config/db.php"); 
        $objdb = new db();
        $this->db = $objdb->conexion();
    }

    //funcion para agregar un detalle de venta
    public function agregarDetallesVenta($id_venta, $id_producto, $cantidad, $subtotal){
        try {
            $statement = $this->db->prepare("
                INSERT INTO detalles_ventas (id_venta, id_producto, cantidad, subtotal) 
                VALUES (:id_venta, :id_producto, :cantidad, :subtotal);
            ");
            $statement->bindParam(':id_venta', $id_venta);
            $statement->bindParam(':id_producto', $id_producto);
            $statement->bindParam(':cantidad', $cantidad);
            $statement->bindParam(':subtotal', $subtotal);

            return ($statement->execute());
        } catch (Exception $e) {
            return false;
        }
    }

    //funcion para obtener los detalles de una venta
    //mostrar los productos relacionados con esa venta
    public function obtenerDetallesVentas($id_venta){ 
        $statement = $this->db->prepare("
            SELECT dv.id_detalle, dv.id_producto,p.nombre, p.precio, dv.cantidad, 
            dv.subtotal from detalles_ventas dv
            JOIN productos p on dv.id_producto = p.id_producto 
            WHERE dv.id_venta = :id_venta;
        ");

        $statement->bindParam(':id_venta', $id_venta);
        return ($statement->execute()) ? $statement->fetchAll(PDO::FETCH_ASSOC) : false;

    }

    //funcion para consultar el precio de un producto que se acaba de agregar a la venta
    //y usar ese precio para calcular el subtotal y hacer un calculo automatico
    public function consultarPrecioProducto($id_producto){
    
        $statement = $this->db->prepare("
            SELECT precio FROM productos WHERE id_producto = :id_producto
        ");
        $statement->bindParam(':id_producto', $id_producto);

        if ($statement->execute()) {
            $resultado = $statement->fetch(PDO::FETCH_ASSOC); // traer solo una fila
            return $resultado ? $resultado['precio'] : 0; // devolver solo el precio si existe, o 0 si no
        } else {
            return 0;
        }
    
    }

    public function actualizarDetallesVenta($id_detalle, $cantidad) {
        // 1. Obtener id_producto y id_venta del detalle
        $stmt = $this->db->prepare("
            SELECT id_producto, id_venta FROM detalles_ventas WHERE id_detalle = :id_detalle
        ");
        $stmt->bindParam(':id_detalle', $id_detalle);
        $stmt->execute();
        $detalle = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$detalle) return false;
    
        $id_producto = $detalle['id_producto'];
        $id_venta = $detalle['id_venta'];
    
        // 2. Obtener el precio del producto
        $stmt = $this->db->prepare("
            SELECT precio FROM productos WHERE id_producto = :id_producto
        ");
        $stmt->bindParam(':id_producto', $id_producto);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$resultado) return false;
    
        $precio = $resultado['precio'];
        $subtotal = $precio * $cantidad;
    
        // 3. Actualizar cantidad y subtotal
        $stmt = $this->db->prepare("
            UPDATE detalles_ventas
            SET cantidad = :cantidad, subtotal = :subtotal
            WHERE id_detalle = :id_detalle
        ");
        $stmt->bindParam(':cantidad', $cantidad);
        $stmt->bindParam(':subtotal', $subtotal);
        $stmt->bindParam(':id_detalle', $id_detalle);
    
        try {
            $stmt->execute();
    
            // 4. Actualizar el total de la venta
            return $this->actualizarTotalVentas($id_venta);
        } catch (Exception $e) {
            return false;
        }
    }

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

    public function eliminarDetallesVenta($id_detalle){ //funcion para eliminar un detalle de venta
        $statement = $this->db->prepare("
            DELETE FROM detalles_ventas WHERE id_detalle = :id_detalle;
        ");//preparamos la consulta

        //pasamos los parametros
        $statement->bindParam(':id_detalle', $id_detalle);

        return ($statement->execute()) ? true : false;//ejecutamos la consulta
    }
    
}