<?php
	// Clase para conectarse a BD
	
	// Tiempo de respuesta del servidor php para una solicitud. I'm crazy.
	ini_set('max_execution_time', 1000000);
	class Conection
	{
		private $servidor;
		private $usuario;
		private $pass;
		private $base_datos;
		private $descriptor;
		private $resultado;
		private $error;

		function __construct($servidor,$usuario,$pass,$base_datos){
			$this->servidor= $servidor;
			$this->usuario= $usuario;
			$this->pass= $pass;
			$this->base_datos= $base_datos;
			$this->conectar_base_datos();
			$this->error=false;
		}

		private function conectar_base_datos(){
			$this->descriptor= mysqli_connect($this->servidor,$this->usuario,$this->pass);
			mysqli_select_db($this->descriptor,$this->base_datos);
			//mysqli_select_db($this->base_datos,$this->descriptor);
			//echo "conexion establecida<hr>";
		}

		public function consulta($consulta){ 
			$this->resultado= mysqli_query($this->descriptor,$consulta);
			if (!$this->resultado) { 
				//$this->error= "Error MySQL: ".mysql_error();
			} else{
				return $this->resultado;
			}
		}

		public function extraer_registro(){
			if ( $fila=mysqli_fetch_array($this->resultado,MYSQL_ASSOC) ){
				return $fila;
			}
			else{
				return false;
			}
		}
		
		public function query_error(){
			return $this->error;
		}
		
		public function last_id(){
			return mysqli_insert_id();
		}
		
		public function close(){
			$this->error= false;
			mysqli_close();
			return true;
		}

	}

	function add_ceros($num){
		$dev="";
		if (strlen($num)==1)
			$dev="000";
		if (strlen($num)==2)
			$dev="00";
		if (strlen($num)==3)
			$dev="0";
		$dev.=$num;
		return $dev;
	}