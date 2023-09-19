<?php 
require_once 'general.php';
class pedidos extends general{
    private $id;
    private $usuario_id;
    private $fecha;
    private $monto;
    private $envio;
    private $ubicación;
    private $productos_id;


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
	public function getUbicación() {
		return $this->ubicación;
	}
	
	/**
	 * @param mixed $ubicación 
	 * @return self
	 */
	public function setUbicación($ubicación): self {
		$this->ubicación = $ubicación;
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
}
?>