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

        $_SESSION['usuario'] = $usuario ?? NULL;
        !is_array($result) ? TRUE : FALSE;
        
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
    public function cambiar_foto($id,$img,$contrasena){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_foto($id,$img,$contrasena);

        $result ? true : false;
    }
    public function cambiar_telefono($id,$telefono,$contrasena){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_telefono($id,$telefono,$contrasena);

        $result ? true : false;
    }
    public function mis_datos($id){
        require_once 'models/usuarios.php';
        $usuario= new usuarios;
        $result=$usuarios->mis_datos($id);

        is_array($result) ? true : false ;
    }
    public function perfil_publico($id){
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuarios->perfil_publico($id);

        is_array($result) ? true : false;
    }
   
}


?>