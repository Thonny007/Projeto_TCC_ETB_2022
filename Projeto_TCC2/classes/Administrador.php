<?php

require_once "Pessoa.php";

class Administrador extends Pessoa {

    function __construct($id = null, $nome = null, $login = null, $senha = null){
        $this->Administrador($id, $nome, $login, $senha);
    }

    private function Administrador($id, $nome, $login, $senha){
        $this->id = $id;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }


    public function loginAlredyExist($login){

        $sql = "SELECT * FROM administrador
        WHERE login_adm = '$login'";

        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
    }

    public function verificaAdmin($login_clt, $senha_clt){
        $sql = "SELECT id_adm, nome_adm, login_adm, senha_adm
        FROM administrador
        WHERE login_adm = '$login_clt'
        AND senha_adm = '$senha_clt' ";

        $query = mysqli_query($this->con, $sql);
        $adm_result = mysqli_fetch_row($query);

        mysqli_close($this->con);

        return $adm_result;
    }

    public function insert(){
        $sql = "INSERT INTO agendamentos.administrador
            (nome_adm, login_adm, senha_adm)
        VALUES 
            ('$this->nome', '$this->login', '$this->senha')";

        try {
            mysqli_query($this->con, $sql);
            echo
            "
            <script>
            alert('☺ Administrador Cadastrado Com Sucesso ☺');
            location.href = '../cadastro_adm.php'
            </script>
            ";
        } catch (Throwable $th) {
            echo
            "
            <script>
            alert('⚠️⚠️ Login Já Cadastrado Favor Tente Outro ⚠️⚠️');
            location.href = '../cadastro_adm.php'
            </script>
                    ";
        }
    }

    public function delete(){
        $sql = "DELETE FROM agendamentos.administrador WHERE id_adm = $this->id";

        try {
            mysqli_query($this->con, $sql);
            echo "
                <script>
                    alert ('☺ Registro de Administrador Deletado/Apagado com Sucesso ☺') 
                </script>
            ";
            echo "
            <script> 
                location.href = ('../lista_adm.php') 
            </script>";


        } catch (Throwable $th) {
            echo "
            <script> 
                alert ('ERRO AO DELETAR ADMINISTRADOR') 
            </script>";

            echo "
            <script> 
                location.href = ('../lista_cadastro_adm.php') 
            </script>";

        }


    }

    public function getById($id, $toAdmin = false){
        $sql = "SELECT * FROM administrador WHERE id_adm = $id";
        $query = mysqli_query($this->con, $sql);

        $result = mysqli_fetch_row($query);

        $admin = new Administrador(
            $result[1],
            $result[2],
            $result[3]
        );

        return $toAdmin ? $admin : $result;
    }

    public function update($id, $adm=0){
        $sql = "UPDATE agendamentos.administrador
        SET 
            login_adm='$this->login',
            nome_adm='$this->nome', 
            senha_adm='$this->senha'
        WHERE id_adm = '$id' ";

        try {
            mysqli_query($this->con, $sql);
            echo "<script>
                    alert ('☺ Cadastro do(a) $this->nome Alterado Com Sucesso ☺')
                    location.href = ('../administracao.php')
                 </script>";
        } catch (Throwable $th) {
            echo "deu errado";
        }

        mysqli_close($this->con);

    }

    public static function getMyAgnds($id_adm){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT
            a.id_agnd as 'id do agendamento',
            a.data_agnd as 'data do agendamento',
            a.descricao_tatto 'descrição da tatuagem',
            c.nome_clt as 'nome do cliente',
            c.id_clt as 'id do cliente'
        from agendamento a

        inner join cliente c on a.id_agnd = c.id_agnd

        inner join administrador adm on adm.id_adm = c.id_adm
        where adm.id_adm = '$id_adm';";

        $result = mysqli_query($con, $sql);

        mysqli_close($con);

        return $result;
    }

    public function setMyAgnds($id_adm, $id_agnd){
        $sql = "UPDATE cliente set id_adm = '$id_adm'
        where id_agnd = '$id_agnd';";

        try {
            mysqli_query($this->con, $sql);
        } catch (Throwable $th) {
            echo "algo deu errado";
        }

        mysqli_close($this->con);
    }


}