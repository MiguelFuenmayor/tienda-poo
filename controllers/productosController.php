<?php 
class productosController {
     public function busqueda($string){
        require_once 'models/productos.php';
        $productos= new productos;
        $resultado=$productos->busqueda($string);
        //VISTAAAA
    }
    public function sacarProducto($id){
        require_once 'models/productos.php'; 
        $productos = new productos;
        $resultado=$productos->sacarProducto($id);
        //VISTA
    }
    /*
    $productos ARRAY
    {
        0 -> 'id'-> productoID, 'cantidad'-> cantidad,
        1 -> 'id'-> productoID, 'cantidad'-> cantidad,
        2 -> 'id'...
    }
    */
    public function vendido($productos){
        require_once 'models/productos.php';
        $objetoProducto = new productos;
        $objetoProducto->vendido($productos);
    }
}