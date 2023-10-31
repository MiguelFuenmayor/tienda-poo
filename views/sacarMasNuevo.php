<div class="lista">
<?php
    foreach($lista_productos as $producto) : ?>
        <div class="lista__producto">
            <img src="<?=$producto['img_url'];?>">
            <h3 class="producto__nombre"><?=$producto['nombre']?></h3>
            <h2 class="producto__precio"><?=$productos->precio($producto['precio'],$producto['descuento'])?></h2>
        </div>
    <?php endforeach; ?> 
    </div>