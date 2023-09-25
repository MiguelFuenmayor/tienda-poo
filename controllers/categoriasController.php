<?php
class categoriasController{
    public function agregar($usuario,$categoria){
        require_once 'models/categorias.php';
        if($usuario['rol']='admin'){
            $categorias= new categorias;
            $nombres=$categorias->All_nombre();
       $result= array_search($categoria,$nombres) ? "La categoría ya existe" : $categorias->agregar_categoria($categoria);
      
      $result ?  /*vista de subida exitosa*/null : /*vista de subida fallida*/null ;
        }
    } //FIN AGREGAR CATEGORÏA

    // esta función elimina segun el nombre
    public function eliminarPorNombre($usuario,$categoria){
        require_once 'models/categorias.php';
        if($usuario['rol']='admin'){
            $categorias= new categorias;
            $nombres=$categorias->All_nombre();
            $key=array_search($categoria,$nombres);
            if(is_numeric($key) && !is_bool($key)){
                $key+=1;
                $result=$categorias->eliminar_categoria($key) ? /*vista de exito */null:/*vista de error */null;
            }else{ /*Vista de error */}
        }
    }
    //esta es más rapida en borrar con la pura id jasjas
    public function eliminarConID($usuario,$id){
        require_once 'models/categorias.php';
        if($usuario['rol']='admin'){
            $categorias=new categorias;
            $categorias->eliminar_categoria($id)? null/*VISTA DE EXITO */ : /* VISTA DE FALLO*/ null;
        }
    }




}