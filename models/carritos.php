<?php
require_once 'general.php';
class carritos extends general{
    private $productos_id;
    public function agregar_producto($id){
        $this->productos_id.=$id;
    }
}

?>