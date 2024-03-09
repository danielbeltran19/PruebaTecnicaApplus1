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
        public function createProduct($codig, $nombre, $price, $category_id){
			$sql = "INSERT INTO `product` (codig, nombre, price, category_id) VALUES ('$codig', '$nombre', '$price', '$category_id')";
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
        public function readProduct(){
			$sql = "SELECT * FROM product";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function ReadCategoryProduct(){
			$sql = "SELECT id, nombre FROM category";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function single_recordCategory($id){
			$sql = "SELECT * FROM category where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res);
			return $return ;
		}
        
        public function single_recordProductos($id){
			$sql = "SELECT * FROM product where id='$id'";
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
        public function updateProduct($id ,$codig ,$nombre, $price, $category_id){
			$sql = "UPDATE product SET codig='$codig', nombre='$nombre', price='$price', category_id='$category_id' WHERE id=$id";
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
      public function deleteProduct($id){
			$sql = "DELETE FROM product WHERE id=$id";
			$res1 = mysqli_query($this->con, $sql);
			if($res1){
				return true;
			}else{
				return false;
			}
		}
        
        
	}

?>	