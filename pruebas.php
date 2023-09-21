<?php
class prueba{
    private $db;
    private $id;
    private $nombre;
    private $mail;
    private $contrasena;
    private $fecha;
    public function __construct(){
        $this->db= new mysqli('localhost','root','','blog');
    }
    public function sacartodos(){
        $result=$this->db->query("SELECT * FROM usuarios");
        $result=$result->fetch_all();
        return $result;
    }
    public function sacar($id){
        if($this->db->errno==0){
            
            $pedido=$this->db->query("SELECT * FROM usuarios WHERE id=$id");
            $pedido=$pedido->fetch_assoc();
            $this->id=$pedido['id'];
            $this->nombre=$pedido['nombre'];
            $this->mail=$pedido['mail'];
            $this->contrasena=$pedido['contrasena'];
            $this->fecha=$pedido['fecha'];
            
        }}    
    
    public function eliminar_de_lista($lista,$digito){
        $lista1= array_column($lista,'producto_id');
       $key=array_search($digito,$lista1);
        unset($lista[$key]);
        foreach($lista as $elemento){
            $nueva_lista[]=$elemento;
        }
        unset($lista);
       return $nueva_lista;
        
    }



    }

$prueba= new prueba;
//var_dump($prueba);
 //var_dump($prueba->sacartodos());

$lista="1,1,2,2,2,3,3,3,4,4,5,5,6,6,7,7,";
$lista_array=[
    0 => [
        'producto_id' => 4,
        'cantidad' => 1
    ],
    1 => [
        'producto_id' => 5,
        'cantidad' => 1
    ],
    2 => [
        'producto_id' => 7,
        'cantidad' => 1
    ],
    3 => [
        'producto_id' => 9,
        'cantidad' => 1
    ]
    ];

$digito="4";
$resultado= $prueba->eliminar_de_lista($lista_array,$digito);
var_dump($resultado);
?>

