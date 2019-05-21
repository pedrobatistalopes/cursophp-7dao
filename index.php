<?php 
	
	require_once("config.php");
	//carrega um usuário
	//$root = new Usuario();
	//$root->loadbyId(3);
	//echo $root;

	//carrega uma lista de usuarios

	//$lista  = Usuario::getList();

	//echo json_encode($lista);


	//carrega uma lista de usuarios pelo login

	//$search = Usuario::search("ro");

	//echo json_encode($search);

	//carrega um usuario usando um login e senha

	$usuario = new Usuario();
	$usuario->login("root","12345");

	echo $usuario;


	//Select simples
	/*
	$sql = new Sql();

	$usuarios = $sql->select("SELECT * FROM  tb_usuarios");

	echo json_encode($usuarios);

	*/
?>