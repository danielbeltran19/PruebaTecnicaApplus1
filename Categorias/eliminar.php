<?php 
if (isset($_GET['id'])){
	include('../Database/conexion.php');
	$categoria = new Database();
	$id=intval($_GET['id']);
	$res = $categoria->deleteCategorias($id);
	if($res){
		header('location: listar.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>