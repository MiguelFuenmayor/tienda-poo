<?php

class carritos{
    /**
     * Summary of productos
     * @var array
     */
    private $productos;
    /**
     * Summary of agregar_producto
     * @param mixed $id
     * @param mixed $cantidad
     * @return void
     */
    
    public function mostrar_orden(){
        require_once 'views/mostrar_orden.php';
    }
    public function agregar_producto($args){
        $id=$args['id'];
        $cantidad=$args['cantidad'];
        $producto=[
            'producto_id'=>$id,
            'cantidad'=>$cantidad
        ];
        $this->productos[]=$producto;
    }
    /**
     * Summary of eliminar_producto
     * @param mixed $id
     * @return void
     */
    public function eliminar_producto($id){
        $lista=$this->productos;
        $lista1= array_column($lista,'producto_id');
       $key=array_search($id,$lista1);
        unset($lista[$key]);
        foreach($lista as $elemento){
            $nueva_lista[]=$elemento;
        }
        unset($lista);
        $this->productos=$nueva_lista;
    }
    public function mod_cantidad($id,$new){
        $lista=$this->productos;
        $lista1= array_column($lista,'producto_id');
       $key=array_search($id,$lista1);
       $lista[$key]['cantidad']=$new;
    }
    public function eliminar_carrito(){
        unset($this->productos);
    }
    public function setProductos($arg){
        $this->productos=$arg;
    }
    public function getProductos(){
        return $this->productos;
    }
}

?>