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


    public function loginAlredyExist(){

        $sql = "SELECT * FROM administrador
        WHERE login_adm = '$this->login'";

        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
    }

    public function verifica($login, $senha){
        $sql = "SELECT id_adm, nome_adm, login_adm, senha_adm
        FROM administrador
        WHERE login_adm = '$login'
        AND senha_adm = '$senha' ";

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
            alert('⚠️⚠️ Erro ao cadastrar ⚠️⚠️');
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

    public static function getById($id, $toObj = false){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT * FROM administrador WHERE id_adm = $id";
        $query = mysqli_query($con, $sql);

        $result = mysqli_fetch_row($query);

        $admin = new Administrador(
            $result[0],
            $result[1],
            $result[2],
            $result[3]
        );

        return $toObj ? $admin : $result;
    }

    public function update($adm=0){
        $sql = "UPDATE agendamentos.administrador
        SET 
            login_adm='$this->login',
            nome_adm='$this->nome', 
            senha_adm='$this->senha'
        WHERE id_adm = '$this->id' ";

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

    public function getMyAgnds(){
        $sql = "SELECT
            a.id_agnd as 'id do agendamento',
            a.data_agnd as 'data do agendamento',
            a.status_agnd as 'status',
            a.descricao_tatto 'descrição da tatuagem',
            c.nome_clt as 'nome do cliente',
            c.id_clt as 'id do cliente'
        from agendamento a

        inner join cliente c on a.id_agnd = c.id_agnd

        inner join administrador adm on adm.id_adm = c.id_adm
        where adm.id_adm = '$this->id';";

        $result = mysqli_query($this->con, $sql);

        mysqli_close($this->con);

        return $result;
    }

    public function setMyAgnds($id_agnd){
        $sql = "UPDATE cliente set id_adm = '$this->id'
        where id_agnd = $id_agnd";

        try {
            mysqli_query($this->con, $sql);
        } catch (Throwable $th) {
            echo "algo deu errado";
            echo $sql;
            echo "<pre>$th</pre>";
        }

        mysqli_close($this->con);
    }


}