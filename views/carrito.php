<?php
if(!empty($carrito->getProductos()) && is_array($carritos->getProductos())):
$carrito->setProductos($_SESSION['productos']);
foreach($carrito->getProductos() as $producto):
    ?>
    <div class="carrito__producto">
    <img class="carrito_producto-imagen">
    <p class="carrito__producto-nombre"></p>
    <p class="carrito__producto-precio"></p>
    </div>
<?php endforeach;

endif;

    
    