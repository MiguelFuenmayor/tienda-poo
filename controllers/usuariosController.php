<?php

class UsuariosController{
    public function registro($args){

        $nombre=$args['nombre'];
        $telefono=$args['telefono'];
        $img_url=$args['img_url'];
        $email=$args['email'];
        $contrasena=$args['contrasena'];

        require_once 'models/usuarios.php';
        $usuario= new usuarios;
        $result=$usuario->registro($nombre,$telefono,$img_url,$email,$contrasena);
        is_array($result) ? /*vista de error */null : /*vista chida */null;
    }
    public function inicio($args){
        $email=$args['email'];
        $contrasena=$args['contrasena'];
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->login($email,$contrasena);

        $_SESSION['usuario'] = $usuario ?? NULL;
        !is_array($result) ? TRUE : FALSE;
        
    }

    //va a hacer falta que ingrese la contraseña para cambiar cualquier dato
    public function cambiar_nombre($args){

        $id=$args['id'];
        $email=$args['email'];
        $contrasena=$args['contrasena'];
        $nombre=$args['nombre'];
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_nombre($id,$email,$contrasena,$nombre);
        //vistas dependiendo del result
        is_bool($result) ? null: null ;
    }
    public function cambiar_contrasena($args){
        $id=$args['id'];
        $email=$args['email'];
        $contrasena=$args['contrasena'];
        $nueva_contrasena=$args['nueva_contrasena'];
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_contrasena($id,$email,$contrasena,$nueva_contrasena); 
        
        is_bool($result) ? null : null;
    }
    public function cambiar_foto($args){
        $id=$args['id'];
        $img=$args['img'];
        $contrasena=$args['contrasena'];
        require_once 'models/usuarios.php';
        $usuario=new usuarios;
        $result=$usuario->cambiar_foto($id,$img,$contrasena);

        $result ? true : false;
    }
    public function cambiar_telefono($args){
        $id=$args['id'];
        $telefono=$args['telefono'];
        $contrasena=$args['contrasena'];
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