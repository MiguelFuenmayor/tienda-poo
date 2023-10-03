<?Php
require_once 'general.php';
class usuarios extends general{
    private $id;
    private $rol;
    private $nombre;
    private $telefono;
    private $img_url;
    private $email;
    private $contrasena;
    private $fecha;
    /**
     * Summary of registro
     * INSERTAR UN USUARIO NUEVO. SE CREAN DOS ARRAYS DURANTE LA FUNCION PARA EFECTUAR UNA ULTIMA COMPROBACIÓN EVITANDO ERRORES Y ASEGURANDO QUE TODOS LOS DATOS LLEGUEN.
	 * LUEGO SE LIMPIAN LOS DATOS Y SE VAN INGRESANDO EN EL ARRAY DEBIDO LOS DATOS. YA SEA ERRORES EN UNO, O UNA PARTE DE LA ENTRADA EN EL OTRO.
	 * SE TRATA LA IMAGEN PARA MOVERLA AL LUGAR ESPERADO, Y SE GUARDA SU NUEVA UBICACIÓN EN LA BASE DE DATOS.
	 * SE VERIFICA QUE NO HAYA ERRORES Y QUE LA ENTRADA ESTÉ COMPLETA
	 * SE EFECTUA LA QUERY
	 * SE DEVUELVE UN RESULTADO:
	 * EXITO:TRUE
	 * FALLO:ARRAY CON LOS ERRORES
     * @return mixed
     */
    public function registro($nombre,$telefono,$img_url,$email,$contrasena){
		//SE COMPRUEBA QUE LA CONECCIÓN FUNCIONE/////////////////////////////////////////////////////////////
		if($this->db->errno==0){
			//CREACIÓN DE ARRAYS ///////////////////////////////////////////////////////////////////////////////////////////////////////////
			$errores[]="";
			$entrada[]="";
			//TRIM////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			$nombre=trim($nombre);$telefono=trim($telefono);$contrasena=trim($contrasena);$email=trim($email);
			//tratado de datos de nombre, telefono, email ////////////////////////////////////////////////////////////////////////////////////
			preg_match("/[A-Za-z]+\s([A-Za-z])?/",$nombre) ? 							$entrada[]=$nombre : 	$errores[]="nombre";
			preg_match("/[0-9]+(-?\s?[0-9])?/",$telefono) ? 							$entrada[]=$telefono : 	$errores[]="telefono";
			preg_match("/[A-Z a-z0-9]@(gmail|hotmail|outlook)\.(com|net)/",$email) ? 	$entrada[]=$email : 	$errores[]="email";
			//tratado de la contrasena/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			preg_match("/[A-Za-z0-9._\-\/]{8,16}/",$contrasena) ? $contrasena=password_hash($contrasena,PASSWORD_DEFAULT) : $errores[]="contrasena";
																						$entrada[]=$contrasena;
			//tratado de la img_url/////////////////////////////////////////////////////////////////////////////////////////////////////////
			if(!empty($img_url) && is_dir('img_tienda') ){
				$img_name=$img_url['name'];
				//$img_type=substr($img['type'],6);
				$img_name="img_blog/$img_name";
				move_uploaded_file($img_url['tmp_name'],$img_name);
																						$entrada[]=$img_name;
			}else{$errores[]="imagen";}
			//DEFINICION DEL RETURN ////////////////////////////////////////////////////////////////////////////////////////////////////
			$result = (count($errores)==0 && count($entrada)==5) 
			?  $this->db->query("INSERT INTO usuarios VALUES (NULL,'cliente','$entrada[0]','$entrada[1]','$entrada[2]','$entrada[3]','$entrada[4]',CURDATE())") 
			: $errores;	
		}
		//RETURN//////////////////////////////////////////////////////
		return $result;
    }


    /**
     * Summary of login
     * 
     * 
     */
    public function login($email,$contrasena){
		$errores[]=null;
        if($this->db->errno == 0){
			preg_match("/[A-Za-z0-9_\-ñ]+@(gmail|outlook|hotmail)\.(com|net)/",$email) ? null : $errores[]="email";
			$hash=$this->db->query("SELECT contrasena FROM usuarios WHERE email='$email'");
			$hash=$hash->fetch_assoc($hash);
			password_verify($contrasena,$hash['contrasena']) ? null : $errores[]="contrasena";
			if(count($errores)==0){
        $user=$this->db->query("SELECT id,nombre,img_url,email,rol FROM usuarios WHERE email='$email' && contrasena='$contrasena'");
        $user=$user->fetch_array();
        $this->id=$user[0];
        $this->nombre=$user[1];
        $this->img_url=$user[2];
        $this->email=$user[3];
        }
	 return $errores;
	}
    
    }
	public function cambiar_nombre($id,$email,$contrasena,$nombre){
		$result="error";
		if($this->db->errno==0){
			$nombre_valido= preg_match("/([A-Za-z]+ [A-Za-z]+){8-22}/",$nombre) ? true : false ;
			if($nombre_valido){
				$hash=$this->db->query("SELECT contrasena FROM usuarios WHERE email='$email' and id='$id'");
				$hash=$hash->fetch_assoc($hash);
				$comprobacion=password_verify($contrasena,$hash['contrasena']);
				if($comprobacion){
					$query="UPDATE usuarios SET nombre='$nombre' WHERE id='$id'";
					$result= $this->db->query($query);
				}else{$result.=" datos";}
			}else{$result.=" nombre";}
		}
	return $result;
	}

	public function cambiar_contrasena($id,$email,$contrasena,$nueva_contrasena){
	    $result="error";
		$verificar_contrasena=preg_match("/[A-Za-z0-9._\-\/]{8,16}/",$nueva_contrasena);
		if($this->db->errno==0 && $verificar_contrasena){
			$hash=$this->db->query("SELECT contrasena FROM usuarios WHERE email='$email' and id='$id'");
			$hash=$hash->fetch_assoc($hash);
			$comprobacion=password_verify($contrasena,$hash['contrasena']);
			if($comprobacion){
				$nueva_contrasena=password_hash($nueva_contrasena,PASSWORD_DEFAULT);
				$query="UPDATE usuarios SET contrasena='$nueva_contrasena' WHERE id='$id'";
				$result= $this->db->query($query);
			}else{$result.=" contrasena_invalida";}
		}else{$result.=" nueva_contrasena_invalida";}
	return $result;
	}

	public function mis_datos($id){
		$datos="error";
		if($this->db->errno==0){
			$query="SELECT nombre,email,rol,telefono,fecha FROM usuarios WHERE id=$id";
			$datos=$this->db->query($query);
			$datos=$datos->fetch_assoc($datos);
		}
	return $datos;
	}
	public function perfil_publico($id){
		if($this->db->errno==0){
			$query="SELECT nombre,img_url FROM usuarios WHERE id='$id'";
			$result=$this->db->query($query);
			return $result;
		}
	}

	public function cambiar_foto($id,$img,$contrasena){
		$result=FALSE;
		if($this->db->errno==0){
			$hash=$this->db->query("SELECT contrasena FROM usuarios WHERE id=$id");
			$hash=$hash->fetch_assoc($hash);
			$comprobacion=password_verify($contrasena,$hash['contrasena']);
			if($comprobacion && !empty($img) && is_dir('img')){
				$img_name=$img['name'];
				$img_url="img/$img_name";
				move_uploaded_file($img['tmp_name'],$img_url);
				$query="UPDATE usuarios SET img_url='$img_url' WHERE id=$id";
				$result=$this->db->query($query);
			}
		}
		return $result;
	}

	public function cambiar_telefono($id,$telefono,$contrasena){
		$result="error";
		if($this->db->errno==0){
			$telefono_valido= preg_match("/0(412|416|424)\-[0-9]{7}/",$telefono) ? true : false ;
			if($telefono_valido){
				$hash=$this->db->query("SELECT contrasena FROM usuarios WHERE and id='$id'");
				$hash=$hash->fetch_assoc($hash);
				$comprobacion=password_verify($contrasena,$hash['contrasena']);
				if($comprobacion){
					$query="UPDATE usuarios SET telefono='$telefono' WHERE id='$id'";
					$result= $this->db->query($query);
				}else{$result.=" datos";}
			}else{$result.=" telefono";}
		}
	return $result;
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
	public function getRol() {
		return $this->rol;
	}
	
	/**
	 * @param mixed $rol 
	 * @return self
	 */
	public function setRol($rol): self {
		$this->rol = $rol;
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
	public function getTelefono() {
		return $this->telefono;
	}
	
	/**
	 * @param mixed $telefono 
	 * @return self
	 */
	public function setTelefono($telefono): self {
		$this->telefono = $telefono;
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
	public function getEmail() {
		return $this->email;
	}
	
	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return mixed
	 */
	public function getContrasena() {
		return $this->contrasena;
	}
	
	/**
	 * @param mixed $contrasena 
	 * @return self
	 */
	public function setContrasena($contrasena): self {
		$this->contrasena = $contrasena;
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
}