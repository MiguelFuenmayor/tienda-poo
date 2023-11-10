<div class="lista">
<?php

    foreach($lista_productos as $producto) : ?>
        <div class="lista__producto">
            <img class=lista__producto-img src="<?=$producto['img_url'];?>">
            <h3 class="lista__producto-nombre"><?=$producto['nombre']?></h3>
            <h2 class="lista__producto-precio">$<?=$productos->precio($producto['precio'],$producto['descuento'])?></h2>
        </div>
    <?php endforeach; ?> 
    </div>