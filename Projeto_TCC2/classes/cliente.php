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
    
    
    public static function loginAlredyExist($login){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT DISTINCT id_clt, nome_clt, login_clt, senha_clt
        FROM cliente
        WHERE login_clt = '$login' ";

        $query = mysqli_query($con, $sql);
        
        return mysqli_fetch_row($query);
    }

    public function insert(): string{
        $sql = "INSERT INTO cliente 
        (nome_clt, data_nascimento, numero_cliente, senha_clt, login_clt)
        VALUES
        ('$this->nome_clt', '$this->data_nascimento', '$this->numero_cliente', '$this->senha_clt', '$this->login_clt')";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "😁 Cadastrado com Sucesso 😁";
        } else {
            return "⚠️ Houve um erro ao cadastrar ⚠️";
        }
        
    }

    public static function list(): mysqli_result /* |bollean */{
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql_consulta = "SELECT id_clt, nome_clt, login_clt, senha_clt, 
        data_nascimento, id_agnd,id_adm, numero_cliente 
        FROM cliente";


        return $result = mysqli_query ($con, $sql_consulta);
    }

    public static function formataData(string $dataRecebida): string{
        $data = new DateTime($dataRecebida);
        
        return $data->format('d/m/Y');
    }

    public function delete(int $id): string{
        $sql = "DELETE FROM cliente WHERE id_clt = '$id'";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "👍 Registro Deletado com Sucesso 👍";
        } else {
            return "⚠️ Houve um Erro ao Deletar o Cliente ⚠️";
        }
        
    }

    public static function getById($id) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT * FROM cliente WHERE id_clt = $id";
        $query = mysqli_query($con, $sql);
        
        return mysqli_fetch_row($query);
    }
    
    public function update($id){        
        $sql = "UPDATE agendamentos.cliente
        SET 
            nome_clt='$this->nome_clt', 
            login_clt='$this->login_clt',
            senha_clt='$this->senha_clt',
            data_nascimento='$this->data_nascimento',
            numero_cliente='$this->numero_cliente'
        WHERE id_clt = '$id' ";

        try {
            mysqli_query($this->con, $sql);
            echo "
            <script>
                alert ('☺ Cadastro do(a) $this->nome_clt Alterado Com Sucesso ☺')
                location.href = ('../adm_cliente.php')
            </script>";
        } catch (\Throwable $th) {
            echo "
            <script>
                alert ('⚠️⚠️ ERRO NA ALTERAÇÃO DE DADOS ⚠️⚠️')
                location.href = ('../adm_cliente.php')
            </script>";

            echo $th;
        }

            mysqli_close($this->con);
        }


    public static function geraRelacionamento($id_cliente, $id_agendamento){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = 
        "UPDATE agendamentos.cliente
        SET id_agnd=$id_agendamento[0]
        WHERE id_clt=$id_cliente";

        try {
            mysqli_query($con, $sql);
            echo "certo?";
        } catch (\Throwable $th) {
            echo "errado?";
        }

        mysqli_close($con);
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