<?php

  include_once 'dao.php';

  class UsuarioDAO extends DAO {
    public $conexao;

    function __construct () {
      $host = "localhost";
      $usuario = "root";
      $senha = "";
      $banco = "banco_de_usuarios";

      $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->banco", "$this->usuario", "$this->senha");
    }

    function cadastrar($nome, $usuario, $email, $senha) {
      $senhaCriptografada = md5($senha);
      
      $preparacao = $this->conexao->prepare("INSERT INTO usuario(nome, usuario, email, senha) VALUES(?, ?, ?, ?)");

      $preparacao->bindParam(1, $nome);
      $preparacao->bindParam(2, $usuario);
      $preparacao->bindParam(3, $email);
      $preparacao->bindParam(4, $senhaCriptografada);

      $resultado = null;
      
      try {
        $resultado = $preparacao->execute();
      } catch (\Throwable $th) {
        if(
          str_contains($th, "Duplicate entry") &&
          str_contains($th, "key 'email'")
        ) {
          return "O e-mail inserido está em uso.";
        } else if(
          str_contains($th, "Duplicate entry") &&
          str_contains($th, "key 'usuario'")
        ) {
          return "O usuário inserido está em uso.";
        }

        return "Ocorreu um erro desconhecido. Tente novamente.";
      }

      return null;
    }

    function login($usuario, $senha) {
      $senhaCriptografada = md5($senha);

      $preparacao = $this->conexao->prepare("SELECT * FROM usuario WHERE usuario=? and senha=?;");

      $preparacao->bindParam(1, $usuario);
      $preparacao->bindParam(2, $senhaCriptografada);

      $resultado = $preparacao->execute();

      return $resultado;
    }

    function listar_usuarios($nome) {
      $comando = "";

      
      if($nome != null) {
        $comando = "SELECT * FROM usuario WHERE nome like '%$nome%';";
      } else {
        $comando = "SELECT * FROM usuario;";
      }
      
      $resultado = $this->conexao->query($comando);

      return $resultado;
    }
  }
