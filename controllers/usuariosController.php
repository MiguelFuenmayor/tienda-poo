<?php

class UsuariosController{
    public function registro($nombre,$telefono,$img_url,$email,$contrasena){
        require_once 'models/usuarios.php';
        $usuario= new usuarios;
        $result=$usuario->registro($nombre,$telefono,$img_url,$email,$contrasena);
        is_array($result) ? /*vista de error */null : /*vista chida */null;
    }
    public function inicio($email,$contrasena){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->login($email,$contrasena);
        if(!is_array($result)){
            $_SESSION['user']=$usuario;
            /*GO TO INDEX; SUCcES */
        }else{
            /*NOSESSIONBABY de vuelta a el login ajsjasja

            /*VISTA DE ERROR MOSTRANDO LOS ERRORES QUE LLEGAN EN EL ARRAY*/
        }  
    }

    //va a hacer falta que ingrese la contraseña para cambiar cualquier dato
    public function cambiar_nombre($id,$email,$contrasena,$nombre){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_nombre($id,$email,$contrasena,$nombre);
        //vistas dependiendo del result
        is_bool($result) ? null: null ;
    }
    public function cambiar_contrasena($id,$email,$contrasena,$nueva_contrasena){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_contrasena($id,$email,$contrasena,$nueva_contrasena); 
        
        is_bool($result) ? null : null;
    }
    public function cambiar_foto(){}
    public function cambiar_telefono(){}
    public function mis_datos(){}
    public function perfil_publico(){}
   
}


?>