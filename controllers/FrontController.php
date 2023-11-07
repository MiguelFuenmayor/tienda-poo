
<?php
class FrontController{
    static function main(){
        if(!empty($_GET['controller']) && !empty($_GET['action']) && !empty($_POST['args'])){
            $controller= new $_GET['controller'];
            $action= $_GET['action'];
            $args=$_POST['args'];
            $controller->$action($args);
        }
    }
}