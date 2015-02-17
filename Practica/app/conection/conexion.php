<?php

//Datos de configuraci�n de la base de datos.
$bd_conf = array(
	'servidor'=>'localhost',
	'usuario'=>'root',
	'password'=>'',
	'base_datos'=>'bdenvios'	
);

/*Clase que se encarga de gestionar la conexion a la base de datos.*/
Class Bd_conexion
{
	private $link;
	private $result;
	private $regActual;
	
	static $_instance;
	
	private function __construct()
	{
		$this->Conectar($GLOBALS['bd_conf']);
	}
	
	/*Patr�n singleton. Evita clonar el objeto.*/
	private function __clone(){ }

	/**
	 * Función que crea el objeto.
	 * 
	 * @return Bd_conexion
	 */
	public static function getInstance()
	{
		if(!(self::$_instance instanceof self))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	
	/**
	 * Hace la conexión con la base de datos.
	 * 
	 * @param unknown $bd_conf
	 */
	private function Conectar($bd_conf)
	{
		if(! is_array($bd_conf))
		{
			echo "<p>Faltan parámetros de configuración</p>";
			var_dump($bd_conf);
			exit;
		}
		else
		{
			$this->link = new mysqli($bd_conf['servidor'], $bd_conf['usuario'], $bd_conf['password'], $bd_conf['base_datos']);
			
			if(! $this->link)
			{
				echo "Error de conexi�n con la base de datos.";
				exit;
			}
			
			//$this->link->select_db($this->base_datos);
			$this->link->query("set names 'utf8'");
		}
	}
	
	
	/**
	 * Ejecuta una consulta SQL y devuelve el resultado de esta
	 * @param string $sql
	 * @return mixed
	 */
	public function Consulta($sql)
	{
		$this->result=$this->link->query($sql);
		return $this->result;
	}
	
	
	/**
	 * Devuelve el siguiente registro del result set devuelto por una consulta.
	 *
	 * @param mixed $result
	 * @return array | NULL
	 */
	public function LeeRegistro($result=NULL)
	{
		if (! $result)
		{
			if (! $this->result)
			{
				return NULL;
			}
			$result=$this->result;
		}
		$this->regActual=$result->fetch_assoc();
		return $this->regActual;
	}
	
	/**
	 * Devuelve el último registro leido
	 */
	public function RegistroActual()
	{
		return $this->regActual;
	}
	
	
	/**
	 * Devuelve el valor del �ltimo campo autonum�rico insertado
	 * @return int
	 */
	public function LastID()
	{
		return $this->link->insert_id;
	}
	
	/**
	 * Devuelve el primer registro que cumple la condici�n indicada
	 * @param string $tabla
	 * @param string $condicion
	 * @param string $campos
	 * @return array|NULL
	 */
	public function LeeUnRegistro($tabla, $condicion, $campos='*')
	{
		$sql="select $campos from $tabla where $condicion limit 1";
		$rs=$this->link->query($sql);
		if($rs)
		{
			return $rs->fetch_array();
		}
		else
		{
			return NULL;
		}
	}
}