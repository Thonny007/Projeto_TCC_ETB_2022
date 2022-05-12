<?php

require_once 'Pessoa.php';

class Cliente extends Pessoa {
    private $data_nascimento;
    private $numero_cliente;

    public function __construct(
        $id = null,
        $nome = null,
        $data_nascimento = null,
        $numero_cliente = null,
        $senha = null,
        $login = null
    ){
        $this->Cliente($id, $nome, $data_nascimento, $numero_cliente, $senha, $login);
    }

    private function Cliente($id, $nome, $data_nascimento, $numero_cliente, $senha, $login){
        $this->id = $id;
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->numero_cliente = $numero_cliente;
        $this->senha = $senha;
        $this->login = $login;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    public function verificaCliente($login, $senha){
        $sql = "SELECT * FROM cliente
        WHERE 
               login_clt = '$login' 
        AND
               senha_clt = '$senha' ";

        $query = mysqli_query($this->con, $sql);
        return mysqli_fetch_row($query);
    }


    public function loginAlredyExist($login){
        $sql = "SELECT DISTINCT id_clt, nome_clt, login_clt, senha_clt
        FROM cliente
        WHERE login_clt = '$login' ";

        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
    }

    public function insert(): string{
        $sql = "INSERT INTO cliente 
        (nome_clt, data_nascimento, numero_cliente, senha_clt, login_clt)
        VALUES
        ('$this->nome', '$this->data_nascimento', '$this->numero_cliente', '$this->senha', '$this->login')";

        $query = mysqli_query($this->con, $sql);

        if ($query) {
            return "😁 Cadastrado com Sucesso 😁";
        } else {
            return "⚠️ Houve um erro ao cadastrar ⚠️";
        }

    }

    public static function list(): mysqli_result
    {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql_consulta = "SELECT id_clt, nome_clt, login_clt, senha_clt, 
        data_nascimento, id_agnd,id_adm, numero_cliente 
        FROM cliente";


        return mysqli_query($con, $sql_consulta);
    }

    /**
     * @throws Exception
     */
    public static function formataData(string $dataRecebida): string
    {
        $data = new DateTime($dataRecebida);

        return $data->format('d/m/Y');
    }

    public function delete()
    {
        $sql = "DELETE FROM cliente WHERE id_clt = '$this->id'";

        try {
            mysqli_query($this->con, $sql);

            echo "
                <script>
                    alert ('☺ Registro Deletado/Apagado com Sucesso ☺') 
                </script>
            ";

            echo "
            <script> 
                location.href = ('../lista_cadastro.php') 
            </script>";


        } catch (Throwable $th) {
            echo "
            <script> 
                alert ('ERRO AO DELETAR DADO') 
            </script>";

            echo "
            <script> 
                location.href = ('../lista_cadastro.php')
            </script>";

        }


    }

    public static function getById($id, $toCLiente = false)
    {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT * FROM cliente WHERE id_clt = $id";
        $query = mysqli_query($con, $sql);

        $result = mysqli_fetch_row($query);

        $cliente = new Cliente(
            $result[0],
            $result[1],
            $result[4],
            $result[7],
            $result[3],
            $result[2],
        );

        return $toCLiente ? $cliente : $result;
    }

    public function getAgendamento($id)
    {
        $sql = "SELECT 
            a.data_agnd, 
            a.status_agnd, 
            a.descricao_tatto
        from agendamento a
        inner join cliente c on a.id_agnd = c.id_agnd
        where c.id_clt = '$id'";

        $query = mysqli_query($this->con, $sql);

        $result = mysqli_fetch_row($query);

        mysqli_close($this->con);

        return $result;
    }

    public function update($id, $adm=0)
    {
        $sql = "UPDATE agendamentos.cliente
        SET 
            nome_clt='$this->nome', 
            login_clt='$this->login',
            senha_clt='$this->senha',
            data_nascimento='$this->data_nascimento',
            numero_cliente='$this->numero_cliente'
        WHERE id_clt = '$id' ";

        try {
            mysqli_query($this->con, $sql);

            if (!$adm) {
                echo "
                    <script> 
                        alert ('☺ Cadastro do(a) $this->nome Alterado Com Sucesso ☺')
                        location.href = ('../adm_cliente.php')
                    </script>";
            } else {
                echo "
                    <script>
                        alert ('☺ Cadastro do(a) $this->nome Alterado Com Sucesso ☺')
                        location.href = ('../administracao.php')
                    </script>";
            }


        } catch (Throwable $th) {
            echo "
            <script>
                alert ('⚠️⚠️ ERRO NA ALTERAÇÃO DE DADOS ⚠️⚠️')
                location.href = ('../adm_cliente.php')
            </script>";

            echo $th;
        }

        mysqli_close($this->con);
    }


    public function geraRelacionamento($id_agendamento){
        $sql =
            "UPDATE agendamentos.cliente
        SET id_agnd=$id_agendamento[0]
        WHERE id_clt= $this->id";

        try {
            mysqli_query($this->con, $sql);
            echo "<script>
                    alert ('☺ AGENDANDO COM SUCESSO ☺')
                    location.href = ('../adm_cliente.php')
                 </script>";
        } catch (Throwable $th) {
            echo "<script>
                    alert ('⚠️⚠️ ERRO AO AGENDATAR TATTOO ⚠️⚠️')
                    location.href = ('../adm_cliente.php')
                 </script>";
        }

        mysqli_close($this->con);
    }
}