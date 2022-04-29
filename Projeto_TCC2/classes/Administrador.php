<?php
class Administrador {
    private $nome_adm;
    private $senha_clt;
    private $login_clt;
    private $con;

    function __construct($nome_adm, $login_clt, $senha_clt) {
        $this->nome_adm = $nome_adm;
        $this->login_clt = $login_clt;
        $this->senha_clt = $senha_clt;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    
    public static function loginAlredyExist($login){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT DISTINCT id_clt, nome_clt, login_clt, senha_clt
        FROM cliente
        WHERE login_clt = '$login' ";

        $query = mysqli_query($con, $sql);

        return mysqli_fetch_row($query);
    }
    
    public static function verificaAdmin($login_clt, $senha_clt) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT id_adm, nome_adm, login_adm, senha_adm
        FROM administrador
        WHERE login_adm = '$login_clt'
        AND senha_adm = '$senha_clt'; ";

        $query = mysqli_query($con, $sql);
        $adm_result = mysqli_fetch_row($query);

        return $adm_result;
    }

public function insert(){
    $sql = "INSERT INTO agendamentos.administrador
            (nome_adm, login_adm, senha_adm)
        VALUES 
            ('$this->nome_adm', '$this->login_clt', '$this->senha_clt')";

    try {
        mysqli_query($this->con, $sql);
        echo 
        "
        <script>
        alert('☺ Administrador Cadastrado Com Sucesso ☺');
        location.href = '../cadastro_adm.php'
        </script>
        ";
    } catch (\Throwable $th) {
        echo
        "
        <script>
        alert('⚠️⚠️ Login Já Cadastrado Favor Tente Outro ⚠️⚠️');
        location.href = '../cadastro_adm.php'
        </script>
                ";
            }
    }
    public function delete($id){
        $sql = "DELETE FROM administrador WHERE id_adm = '$id'";

        try {
            $query = mysqli_query($this->con, $sql);
            
            echo "
                <script>
                    alert ('☺ Registro de Administrador Deletado/Apagado com Sucesso ☺') 
                </script>
            ";
            echo "
            <script> 
                location.href = ('../lista_adm.php') 
            </script>";

            
        } catch (\Throwable $th) {
            echo "
            <script> 
                alert ('ERRO AO DELETAR ADMINISTRADOR') 
            </script>";
            
            echo "
            <script> 
                location.href ('../lista_cadastro_adm.php') 
            </script>";
            
        }


    }

    public static function getById($id, $toAdmin=false) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT * FROM administrador WHERE id_adm = $id";
        $query = mysqli_query($con, $sql);
        
        $result = mysqli_fetch_row($query);
        
        $admin = new Administrador(
            $result[1],
            $result[2],
            $result[3],
        );

       return $toAdmin ? $admin : $result;
    }
    
    public function update($id){        
        $sql = "UPDATE agendamentos.administrador
        SET 
            login_adm='$this->login_clt',
            nome_adm='$this->nome_adm', 
            senha_adm='$this->senha_clt'
        WHERE id_adm = '$id' ";

        try {
            mysqli_query($this->con, $sql);
            echo "<script>
                    alert ('☺ Cadastro do(a) $this->nome_adm Alterado Com Sucesso ☺')
                    location.href = ('../administracao.php')
                 </script>";
        } catch (\Throwable $th) {
            echo "deu errado";
        }

        mysqli_close($this->con);
    }
    public function id_adm_agnd() {
            $slq = "SELECT a.*,
	            c.nome_clt as 'nome do cliente',
	            c.id_clt as 'id do cliente',
	            adm.nome_adm as 'nome do adm'
            from agendamento a 
                inner join cliente c on a.id_agnd = c.id_agnd
                inner join administrador adm on adm.id_adm = c.id_adm  
            where adm.id_adm  = 1;"
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
}
?>