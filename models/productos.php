<?php
require_once 'general.php';
class productos extends general{
    private $id;
    private $img_url;
    private $nombre;
    private $descripcion;
    private $precio;
    private $descuento;
    private $categorias;
    private $stock;

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
	public function getImg_url() {
		return $this->img_url;
	}
	
	/**
	 * @param mixed $img_url 
	 * @return self
	 */
	public function setImg_url($img_url): self {
		$this->img_url = $img_url;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getNombre() {
		return $this->nombre;
	}
	
	/**
	 * @param mixed $nombre 
	 * @return self
	 */
	public function setNombre($nombre): self {
		$this->nombre = $nombre;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDescripcion() {
		return $this->descripcion;
	}
	
	/**
	 * @param mixed $descripcion 
	 * @return self
	 */
	public function setDescripcion($descripcion): self {
		$this->descripcion = $descripcion;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getPrecio() {
		return $this->precio;
	}
	
	/**
	 * @param mixed $precio 
	 * @return self
	 */
	public function setPrecio($precio): self {
		$this->precio = $precio;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getDescuento() {
		return $this->descuento;
	}
	
	/**
	 * @param mixed $descuento 
	 * @return self
	 */
	public function setDescuento($descuento): self {
		$this->descuento = $descuento;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getCategorias() {
		return $this->categorias;
	}
	
	/**
	 * @param mixed $categorias 
	 * @return self
	 */
	public function setCategorias($categorias): self {
		$this->categorias = $categorias;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getStock() {
		return $this->stock;
	}
	
	/**
	 * @param mixed $stock 
	 * @return self
	 */
	public function setStock($stock): self {
		$this->stock = $stock;
		return $this;
	}
}
?>