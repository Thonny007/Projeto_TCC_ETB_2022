<?php

class Administrador extends Pessoa {

    function __construct($nome, $login, $senha){
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }


    public static function loginAlredyExist($login){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT DISTINCT id_clt, nome_clt, login_clt, senha_clt
        FROM cliente
        WHERE login_clt = '$login'";

        $query = mysqli_query($con, $sql);

        return mysqli_fetch_row($query);
    }

    public static function verificaAdmin($login_clt, $senha_clt){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT id_adm, nome_adm, login_adm, senha_adm
        FROM administrador
        WHERE login_adm = '$login_clt'
        AND senha_adm = '$senha_clt'; ";

        $query = mysqli_query($con, $sql);
        $adm_result = mysqli_fetch_row($query);

        mysqli_close($con);

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

    public function delete($id){
        $sql = "DELETE FROM agendamentos.administrador WHERE id_adm = $id";

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

    public static function getById($id, $toAdmin = false){
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