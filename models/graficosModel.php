<?php

class graficosModel {
    
    private $db;

    public function __construct() {
        require_once("c:/xampp/htdocs/iboss/config/db.php");
        $objdb = new db();
        $this->db = $objdb->conexion();
    }

    // 1. Total vendido por categoría
    public function ventasPorCategoria() {
        $stmt = $this->db->prepare("
            SELECT c.nombre_cat, SUM(dv.subtotal) AS total_ventas
            FROM categorias c
            JOIN productos p ON c.id_categoria = p.id_categoria
            JOIN detalles_ventas dv ON p.id_producto = dv.id_producto
            GROUP BY c.id_categoria
            ORDER BY c.id_categoria
        ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $row['nombre_cat'];
            $values[] = (float)$row['total_ventas'];
        }

        return ['labels' => $labels, 'data' => $values];
    }

    // 2. Total vendido por producto (cantidad)
    public function ventasPorProducto() {
        $stmt = $this->db->prepare("
            SELECT p.nombre, SUM(dv.cantidad) AS total_cantidad
            FROM productos p
            JOIN detalles_ventas dv ON p.id_producto = dv.id_producto
            GROUP BY p.id_producto
            ORDER BY p.id_producto
        ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $row['nombre'];
            $values[] = (int)$row['total_cantidad'];
        }

        return ['labels' => $labels, 'data' => $values];
    }

    // 3. Stock actual por producto
    public function stockPorProducto() {
        $stmt = $this->db->prepare("
            SELECT p.nombre, e.cantidad
            FROM productos p
            JOIN existencias e ON p.id_producto = e.id_producto
            ORDER BY p.id_producto
        ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $row['nombre'];
            $values[] = (int)$row['cantidad'];
        }

        return ['labels' => $labels, 'data' => $values];
    }

    // 4. Total de ventas por día
    public function ventasPorDia() {
        $stmt = $this->db->prepare("
            SELECT DATE(v.fecha_venta) AS fecha, SUM(v.total_con_desc) AS total_ventas
            FROM ventas v
            GROUP BY DATE(v.fecha_venta)
            ORDER BY fecha ASC
        ");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $row['fecha'];
            $values[] = (float)$row['total_ventas'];
        }

        return ['labels' => $labels, 'data' => $values];
    }
}
