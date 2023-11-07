<?php 
class pedidosController{

    /*esta cosa recibe un array de alguna vista para crear el inserción en la DB
    los datos del array serian:
    USUARIO_ID
    MONTO
    ENVIO
    UBICACION
    PRODUCTOS_ID (ARRAY)
    ESTADO 
    */
    public function agregar_pedido($array){
        require_once 'models/pedidos.php';
        $pedido = new pedidos;
        $pedido->agregar_DB($array);
        //inserte la vista de exito o error//
    }
    public function eliminar_pedido($args){
        $id=$args['id'];
        $user_id=$args['user_id'];
        require_once 'models/pedidos.php';
        $pedido= new pedidos;
       $result=$pedido->eliminar_pedido($id,$user_id);
       //vista que usa $result para mostrar si funcionó o no
    }
    public function detalle_pedido($id){
        require_once 'models/pedidos.php';
        $pedido= new pedidos;
        //el objeto $pedido es lo que se utilizará en la vista
        $pedido->Seleccionar_from_DB($id);
        //inserte vista
    }
    public function todos_mis_pedidos($user_id){
        require_once 'models/pedidos.php';
        $pedido = new pedidos;
        $pedido->mis_pedidos($user_id);
        //inserte vista mostrando todos los pedidos//
    }
}