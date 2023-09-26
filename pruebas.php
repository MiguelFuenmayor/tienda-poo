<?php
class prueba{
    private $db;
    private $id;
    private $nombre;
    private $mail;
    private $contrasena;
    private $fecha;
    public function __construct(){
      
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

    public function convertir_string_en_array($string){
        
        preg_match_all("/\(([0-9]+)x([0-9]+)\)/",$string,$matches);
        //entonces, los id de los productos estan en $matches[1][x] y
        //las cantidades están en $matches[2][x]; ahora toca armar el array.
        $productos_id=$matches[1];
        $cantidades=$matches[2];
        $numero_productos=count($matches[0]);
        $numero_productos--;
        
        for($i=0;$i<=$numero_productos;$i++){
            $array[$i]=[
                'producto_id' => $productos_id[$i],
                'cantidad' => $cantidades[$i]
            ];
        }

        return $array;
    }

    }

$prueba= new prueba;
//var_dump($prueba);
 //var_dump($prueba->sacartodos());

$lista="1,1,2,2,2,3,3,3,4,4,5,5,6,6,7,7,";
$lista_array=[
    0 => [
        'producto_id' => '4',
        'cantidad' => '1'
    ],
    1 => [
        'producto_id' => '5',
        'cantidad' => '1'
    ],
    2 => [
        'producto_id' => '7',
        'cantidad' => '1'
    ],
    3 => [
        'producto_id' => '9',
        'cantidad' => '1'
    ]
    ];
    $lista_string="(4x1)(5x1)(7x1)(9x1)";
    $array=$prueba->convertir_string_en_array($lista_string);
    var_dump($array);
$digito="4";
$resultado= $prueba->eliminar_de_lista($lista_array,$digito);
var_dump($resultado);
?>

