<?php

class Cliente {

        private $nome_clt;
        private $data_nascimento;
        private $numero_cliente;
        private $senha_clt;
        private $login_clt;
        private $id_agnd;
        private $id_adm;
        private $con;

    public function __construct($nome_clt, $data_nascimento, $numero_cliente, $senha_clt, $login_clt) {
        $this->nome_clt = $nome_clt;
        $this->data_nascimento = $data_nascimento;
        $this->numero_cliente = $numero_cliente;
        $this->senha_clt = $senha_clt;
        $this->login_clt = $login_clt;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    public static function verificaCliente($login, $senha) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        $sql = "SELECT id_clt, nome_clt, login_clt, senha_clt
        FROM cliente
        WHERE 
               login_clt = '$login' 
        AND
               senha_clt = '$senha' ";

        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_row($query);

        return $result;
    }
    
    public function insert(): string{
        $sql = "INSERT INTO cliente 
        (nome_clt, data_nascimento, numero_cliente, senha_clt, login_clt)
        VALUES
        ('$this->nome_clt', '$this->data_nascimento', '$this->numero_cliente', '$this->senha_clt', '$this->login_clt')";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "Cadastrado com sucesso";
        } else {
            return "Houve um erro ao cadastrar";
        }
        
    }

    public function delete(int $id): string{
        $sql = "DELETE FROM cliente WHERE id_clt = '$id'";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "registro deletado com sucesso";
        } else {
            return "houve um erro ao deletar o cliente";
        }
        
    }

    public function getById(int $id): string{
        $sql = "SELECT * FROM cliente WHERE id_clt = $id";
        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
    }
            
    function getId_agnd() {
        return $this->id_agnd;
    }

    function getId_adm() {
        return $this->id_adm;
    }

    function setId_agnd($id_agnd) {
        $this->id_agnd = $id_agnd;
    }

    function setId_adm($id_adm) {
        $this->id_adm = $id_adm;
    }

    function getNome_clt() {
        return $this->nome_clt;
    }

    function getData_nascimento() {
        return $this->data_nascimento;
    }

    function getNumero_cliente() {
        return $this->numero_cliente;
    }

    function getSenha_clt() {
        return $this->senha_clt;
    }

    function getLogin_clt() {
        return $this->login_clt;
    }

    function setNome_clt($nome_clt) {
        $this->nome_clt = $nome_clt;
    }

    function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    function setNumero_cliente($numero_cliente) {
        $this->numero_cliente = $numero_cliente;
    }

    function setSenha_clt($senha_clt) {
        $this->senha_clt = $senha_clt;
    }

    function setLogin_clt($login_clt) {
        $this->login_clt = $login_clt;
    }

}