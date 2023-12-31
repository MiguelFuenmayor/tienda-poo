<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
  <link rel="stylesheet" src="style/normalize.css"/>
  <link rel="stylesheet" src="style/styles.css"/>
  <?php
  require_once 'autoload.php';
  
  $carrito= new carritos();
  session_start();
  ?>
  <title>Mi Tienda</title>
</head>

<body class="body">
  <div class="grid-container">
    <!--BARRA SUPERIOR: INCLUIRÁ EL LOGO, NOMBRE, LISTA DE OPCIONES, CATEGORIAS, BARRA DE BUSQUEDA, USUARIO Y EL CARRITO-->
    <header class="barra grid-item">
      <img src="styles/logo.png" class="barra__logo" />
      <H1 class="barra__titulo">Mi tienda</H1>
      <div class="barra__busqueda">
        <input type="text" placeholder="Ingrese su busqueda..." />
      </div>
      <span class="material-symbols-outlined">shopping_cart_checkout</span>

      <div class="barra__carrito">
         <?php require_once 'views/carrito.php'; ?>
      </div>

      <span class="material-symbols-outlined">Menu</span>
      <div class="barra__menu">
        <div class="barra__menu-categorias"></div>
        <div class="barra__menu-usuario">
          <?php /*
          if (!empty($_SESSION['usuario']['img'] == 'default')) : ?>
            <span class="material-symbols-outlined">
              account_circle
            </span>
          <?php endif;
          */?>
        </div>
        <div class="barra__menu-opciones"></div>
      </div>
    </header>

    <!-- <aside class="lateral grid-item"> <!--LATERAL: tendrá la barra de busqueda avanzada, para buscar por precios y categorias, solos será visible tras la primera busqueda
      LATERAL
    </aside> -->
    <div class="contenido grid-item"> <!--CONTENIDO: aquí se cargaran todas las vistas, los distintos productos, etc -->
      <!--AGREGAR EL CONTROLADOR FRONTAL-->
      <?Php FrontController::main(); ?>
    </div>
    <footer class="pie grid-item">
      <p>Desarrollado por Miguel Fuenmayor &copy. Todos los derechos reservados <?php date('Y'); ?> </p>
    </footer>
  </div>
</body>

</html>