<?php

    class DAO {
        public $host = "localhost";
        public $usuario = "root";
        public $senha = "";
        public $banco = "banco_de_usuarios";
        public $conexao;

        function prepararBanco() {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->banco", "$this->usuario", "$this->senha");
        }
    }
