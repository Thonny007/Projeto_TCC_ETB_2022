<?php
class Administrador {
    private $nome_adm;
    private $senha_clt;
    private $login_clt;
    private $con;

    function __construct($senha_clt, $login_clt) {
        $this->senha_clt = $senha_clt;
        $this->login_clt = $login_clt;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    function Administrador($nome_adm, $login_clt, $senha_clt) {
        $this->nome_adm = $nome_adm;
        $this->login_clt = $login_clt;
        $this->senha_clt = $senha_clt;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    public static function verificaAdmin($login_clt, $senha_clt) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT id_adm, nome_adm, login_adm, senha_adm
        FROM administrador
        WHERE 
               login_adm = '$login_clt' 
        AND
               senha_adm = '$senha_clt' ";

        $query = mysqli_query($con, $sql);
        $result = mysqli_fetch_row($query);

        return $result;
    }

    public function insert(): string {
        $sql_consulta = "SELECT login_adm FROM administrador WHERE  = '$this->login_clt'";

        $result = mysqli_query($this->con,$sql_consulta);

        $linhas = mysqli_num_rows($result);

        if ($linhas == 1) {

            die("login já existente  
                <script>
                    locale.href = ('cadastra_fun.php')
                </script>");
        } else {
            $sql = "INSERT INTO administrador (nome_adm, senha_adm, login_adm)
        VALUES
        ($this->nome_adm, $this->senha_clt, $this->login_clt)";

            $query = mysqli_query($this->con, $sql);
            if ($query) {
                return "Cadastrado com sucesso";
            } else {
                return "<script> 
                            alert ('Erro ao Cadastrar Tente Novamente!!') 
                        </script>";
                 return "<script> location.href = ('../cadastro.php') </script>";
  }
            }
        }
    }

   function delete($id) {
        $sql = "DELETE FROM administrador WHERE id_clt = '$id'";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "<script> 
                        alert ('☺ Registro Deletado com Sucesso ☺') 
                    </script>";
            return"<script> location.href = ('index.php') </script>";;
        } else {
            return "<script> 
                        alert ('Houve um Erro ao Deletar o Cliente') 
                    </script>";
        }
    }

     function getById(int $id): string {
        $sql = "SELECT * FROM administrador WHERE id_adm = $id";
        $query = mysqli_query($this->con, $sql);
        $result = mysqli_fetch_row($query);

        return $result;
    }


    function getNome_adm() {
        return $this->nome_adm;
    }

    function getSenha_clt() {
        return $this->senha_clt;
    }

    function getLogin_clt() {
        return $this->login_clt;
    }

    function setNome_adm($nome_adm) {
        $this->nome_adm = $nome_adm;
    }

    function setSenha_clt($senha_clt) {
        $this->senha_clt = $senha_clt;
    }

    function setLogin_clt($login_clt) {
        $this->login_clt = $login_clt;
    }

?>