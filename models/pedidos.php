<?php 
require_once 'general.php';
class pedidos extends general{
    private $id;
    private $usuario_id;
    private $fecha;
    private $monto;
    private $envio;
    private $ubicacion;
    private $productos_id;
    private $estado;

	public function salida_productos_id($string){
		
	}

	public function entrada_productos_id($array){
		$result="";
		foreach($array as $producto){
			$id=$producto['producto_id'];
			$cantidad=$producto['cantidad'];
			$result.="(".$id."x".$cantidad.")";
		}
		return $result;
	}
/*
ESTA FUNCION RECIBE UN ARRAY CON LOS SIGUIENTES DATOS:
USUARIO_ID
MONTO
ENVIO
UBICACION
PRODUCTOS_ID (ARRAY)
ESTADO
*/
	public function agregar_DB($pedido){
		if($this->db->errno==0){
			if(is_array($pedido) && count($pedido)==5){
				$productos_id=$this->entrada_productos_id($pedido['productos_id']);
				$query="INSERT INTO pedidos VALUES(NULL,{$pedido['usuario_id']},CURDATE(),{$pedido['monto']},{$pedido['envio']},'{$pedido['ubicacion']}','{$productos_id}','{$pedido['estado']}')";
				$result=$this->db->query($query);
				return $result;


			}
		}
	}

    public function select($id){
        if($this->db->errno==0){
            $pedido=$this->db->query("SELECT * FROM pedidos WHERE id=$id");
            $pedido=$pedido->fetch_assoc();
			$this->id=$pedido['id'];
			$this->usuario_id=$pedido['usuario_id'];
			$this->fecha=$pedido['fecha'];
			$this->monto=$pedido['monto'];
			$this->envio=$pedido['envio'];
			$this->ubicacion=$pedido['ubicacion'];
			$this->productos_id=$pedido['productos_id'];
			$this->estado=$pedido['estado'];
        }   
    }
	public function mis_pedidos($user_id){
		if($this->db->errno==0){
			$mis_pedidos=$this->db->query("SELECT * FROM pedidos WHERE usuario_id=$user_id");
			$mis_pedidos->fetch_all();
			return $mis_pedidos;
		}
	}
	
	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getUsuario_id() {
		return $this->usuario_id;
	}
	
	/**
	 * @param mixed $usuario_id 
	 * @return self
	 */
	public function setUsuario_id($usuario_id): self {
		$this->usuario_id = $usuario_id;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getFecha() {
		return $this->fecha;
	}
	
	/**
	 * @param mixed $fecha 
	 * @return self
	 */
	public function setFecha($fecha): self {
		$this->fecha = $fecha;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getMonto() {
		return $this->monto;
	}
	
	/**
	 * @param mixed $monto 
	 * @return self
	 */
	public function setMonto($monto): self {
		$this->monto = $monto;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getEnvio() {
		return $this->envio;
	}
	
	/**
	 * @param mixed $envio 
	 * @return self
	 */
	public function setEnvio($envio): self {
		$this->envio = $envio;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getUbicacion() {
		return $this->ubicacion;
	}
	
	/**
	 * @param mixed $ubicación 
	 * @return self
	 */
	public function setUbicacion($ubicacion): self {
		$this->ubicacion = $ubicacion;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getProductos_id() {
		return $this->productos_id;
	}
	
	/**
	 * @param mixed $productos_id 
	 * @return self
	 */
	public function setProductos_id($productos_id): self {
		$this->productos_id = $productos_id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEstado() {
		return $this->estado;
	}
	
	/**
	 * @param mixed $estado 
	 * @return self
	 */
	public function setEstado($estado): self {
		$this->estado = $estado;
		return $this;
	}
}
?>