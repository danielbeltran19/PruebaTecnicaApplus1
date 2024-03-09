<?php

	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="bd_applus";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
		public function createCategory($nombre){
			$sql = "INSERT INTO `category` (nombre) VALUES ('$nombre')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
        public function create1($id_titular, $doc, $nombres, $apellidos, $fecha_na, $fecha_af, $par, $ods){
			$sql = "INSERT INTO `beneficiario` (id_titular, doc, nombres, apellidos, fecha_na, fecha_af, par, ods) VALUES ('$id_titular', '$doc', '$nombres', '$apellidos', '$fecha_na', '$fecha_af', '$par', '$ods')";
			$res1 = mysqli_query($this->con, $sql);
			if($res1){
				return true;
			}else{
				return false;
			}
		   }

		public function read(){
			$sql = "SELECT * FROM category";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
        public function read2(){
			$sql = "SELECT * FROM beneficiario";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}	
		
		public function single_record($id){
			$sql = "SELECT * FROM category where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
        
        public function single_record1($doc){
			$sql = "SELECT * FROM beneficiario where doc='$doc'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
		
        public function updateCategory($id, $nombre){
            $sql = "UPDATE category SET nombre='$nombre' WHERE id=$id";
            $res = mysqli_query($this->con, $sql);
            if($res){
                return true;
            } else {
                return false;
            }
        }        
        public function update2($id_titular,$doc ,$nombres, $apellidos, $fecha_na, $fecha_af, $par, $ods){
			$sql = "UPDATE beneficiario SET id_titular='$id_titular', nombres='$nombres', apellidos='$apellidos', fecha_na='$fecha_na', fecha_af='$fecha_af', par='$par', ods='$ods' WHERE doc=$doc";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
       
		public function deleteCategorias($id){
			$sql = "DELETE FROM category WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
      public function delete2($doc){
			$sql = "DELETE FROM beneficiario WHERE doc=$doc";
			$res1 = mysqli_query($this->con, $sql);
			if($res1){
				return true;
			}else{
				return false;
			}
		}
        
        
	}

?>	