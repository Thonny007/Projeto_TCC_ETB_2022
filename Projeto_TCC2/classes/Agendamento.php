<?php

class Agendamentos {
    private $id;
    private $data;
    private $status;
    private $con;
    private $imagem;
    private $desc;

    function __construct(
        $id = null,
        $data = null,
        $status = null,
        $imagem = null,
        $desc = null
    ) {
        $this->Agendamentos($id, $data, $status, $imagem, $desc);
    }


    private function Agendamentos(
        $id,
        $data,
        $status,
        $imagem,
        $desc
    ){
        $this->id = $id;
        $this->data = $data;
        $this->desc = $desc;
        $this->imagem = $imagem;
        $this->status = $status;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }


    public function insert(){
        $sql = "INSERT INTO agendamento
            (data_agnd, imagem_atendimento, descricao_tatto)
        VALUES
            ('$this->data','$this->imagem','$this->desc')";

        mysqli_query($this->con, $sql);


        $getLastId = "SELECT a.id_agnd  FROM agendamento a
        order by a.id_agnd desc limit 1;";

        $queryLastId = mysqli_query($this->con, $getLastId);
        $resultLastId = mysqli_fetch_row($queryLastId);

        mysqli_close($this->con);

        return $resultLastId;
    }

    public function list($excluidos = false ){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        if (!$excluidos) {
            $sql_consulta =
                "SELECT 
                ag.id_agnd as 'id', 
                ag.data_agnd as 'data', 
                ag.status_agnd as 'status', 
                ag.descricao_tatto as 'desc',
                c.nome_clt as 'cliente', 
                c.id_clt as 'id cliente'
            FROM agendamento ag
            inner join cliente c on c.id_agnd  = ag.id_agnd
            where ag.status_agnd  = 'espera'";
        } else {
            $sql_consulta =
                "SELECT 
                ag.id_agnd as 'id', 
                ag.data_agnd as 'data', 
                ag.status_agnd as 'status', 
                ag.descricao_tatto as 'desc',
                c.nome_clt as 'cliente', 
                c.id_clt as 'id cliente'
            FROM agendamento ag
            inner join cliente c on c.id_agnd  = ag.id_agnd
            where ag.status_agnd = 'desmarcado' ";
        }

        return mysqli_query ($con, $sql_consulta);
    }

    public function getImg(){
        $sql = "SELECT imagem_atendimento FROM agendamento WHERE id_agnd = $this->id";
        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
    }

    public function delete(){
        $sql = "DELETE FROM agendamento WHERE id_agnd = '$this->id'";

        try {
            mysqli_query($this->con, $sql);

            echo "
                <script>
                    alert ('☺ Registro Deletado/Apagado com Sucesso ☺') 
                </script>
            ";

            echo "
            <script> 
                location.href = '../lista_agendamento_excluido.php' 
            </script>";


        } catch (Throwable $th) {
            echo "
            <script> 
                alert ('ERRO AO DELETAR DADO') 
            </script>";

            echo "
            <script> 
                location.href = '../lista_agendamento_excluido.php' 
            </script>";

        }


    }

    public static function getById($id, $toAgnd=false) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");

        $sql = "SELECT * FROM agendamento WHERE id_agnd = $id";
        $query = mysqli_query($con, $sql);

        $result = mysqli_fetch_row($query);

        $agnd = new Agendamentos (
            $result[0],
            $result[1],
            $result[2],
            $result[3],
            $result[4]
        );

        return $toAgnd ? $agnd : $result;
    }

    /*------------------------- UPDATE DO AGENDAMENTO --------------------------*/
     public function update($id, $agnd=false)
    {
        $sql = "UPDATE agendamentos.cliente
        SET 
        id_agnd = $this->id = $id;
        data_agnd = $this->data = $data;
        descricao_tattoo = $this->desc = $desc;
        imagem_atendimento = $this->imagem = $imagem;
        status_agnd = $this->status = $status;
        WHERE id_agnd = '$id' ";

        try {
            mysqli_query($this->con, $sql);

            if (!$adm) {
                echo "
                    <script> 
                        alert ('☺ Agendamento Alterado Com Sucesso ☺')
                        location.href = ('../lista_agendamentos.php')
                    </script>";
            } else {
                echo "
                    <script>
                        alert ('☺ Agendamento Alterado Com Sucesso ☺')
                        location.href = ('../lista_agendamentos.php')
                    </script>";
            }


        } catch (Throwable $th) {
            echo "
            <script>
                alert ('⚠️⚠️ ERRO NA ALTERAÇÃO DO AGENDAMENTO ⚠️⚠️')
                location.href = ('../adm_cliente.php')
            </script>";

            echo $th;
        }

        mysqli_close($this->con);
    } 
/*------------------------- UPDATE DO AGENDAMENTO ⬆️⬆️ -------------------------*/
    public function updateStatus($new_status){
        $this->setStatus($new_status);

        $sql = "UPDATE agendamento SET status_agnd='$this->status'
	    WHERE id_agnd=$this->id;";

        mysqli_query($this->con, $sql);
        mysqli_close($this->con);
    }

    /**
     * @throws Exception
     */
    public static function formataData($dataRecebida){
        $data = new DateTime($dataRecebida);

        return $data->format('d/m/Y H:i');
    }

    public function setStatus($status){
        $this->status = $status;
    }


}
