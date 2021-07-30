<?php

include 'usuario_dao.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$usuarioDAO = new UsuarioDAO();

$nome = $_GET['nome'];
$usuario = $_GET['usuario'];
$email = $_GET['email'];
$senha = $_GET['senha'];

$resultado = $usuarioDAO->cadastrar($nome, $usuario, $email, $senha);

if($resultado == null) {
  header("Location: index.php?mensagemSucesso=Usuário Cadastrado!");
} else {
  header("Location: index.php?mensagemErro=$resultado");
}

?>