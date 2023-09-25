<?php 
require_once 'general.php';
class categorias extends general{
    Private $id;
    Private $nombre;
    
	public function agregar_categoria($categoria){
		if($this->db->errno==0){
			$query="INSERT INTO categorias VALUES (null,'$categoria')";
			$result=$this->db->query($query);
			return $result;
		}
	}
	public function eliminar_categoria($id){
		if($this->db->errno==0){
			$query="DELETE FROM categorias WHERE id=$id";
			$result= $this->db->query($query);
			return $result;
		}
	}
    
	public function all_nombre(){
		if($this->db->errno==0){
			$nombres=$this->db->query("SELECT nombre FROM categorias");
			$nombres=$nombres->fetch_array($nombres);
			return $nombres;
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
}