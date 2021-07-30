<?php

include_once 'usuario_dao.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuario = $_GET["usuario"];
$senha = $_GET["senha"];

$usuarioDAO = new UsuarioDAO();

$resultado = $usuarioDAO->login($usuario, $senha);

if($resultado > 0) {
  header("location: lista_usuarios.php");
} else {
  header("location: index.php?mensagem=Usuário não encontrado!");
}

?>