<?php

class Agendamentos {
    private $data_agendamento;
    private $status_agendamento;
    private $con;
    private $imagem;
    private $desc;

    function __construct($data_agendamento, $imagem, $desc) {
        $this->data_agendamento = $data_agendamento;
        $this->desc = $desc;
        $this->imagem = $imagem;
        $this->con = mysqli_connect("localhost", "root", "", "agendamentos");
    }

    

    public function insert(){
        $sql = "INSERT INTO agendamento
            (data_agnd, imagem_atendimento, descricao_tatto)
        VALUES
            ('$this->data_agendamento','$this->imagem','$this->desc')";

        mysqli_query($this->con, $sql);


        $getLastId = "SELECT a.id_agnd  FROM agendamento a
        order by a.id_agnd desc limit 1;";

        $queryLastId = mysqli_query($this->con, $getLastId);
        $resultLastId = mysqli_fetch_row($queryLastId);
        
        mysqli_close($this->con);

        return $resultLastId;
    }

    public static function list($excluidos = false ): mysqli_result /* | bollean */{
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
            where ag.status_agnd  != 'desmarcado'";
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
    
        return $result = mysqli_query ($con, $sql_consulta);
    }

    public static function getImgById($id){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        $sql = "SELECT id_agnd FROM agendamento WHERE id_agnd = $id";
        
        return mysqli_query($con, $sql);
    }
    public function delete($id){
        $sql = "DELETE FROM agendamento WHERE id_agnd = '$id'";

        try {
            $query = mysqli_query($this->con, $sql);
            
            echo "
                <script>
                    alert ('☺ Registro Deletado/Apagado com Sucesso ☺') 
                </script>
            ";
            
            echo "
            <script> 
                location.href = ('../lista_agendamento_excluido.php') 
            </script>";

            
        } catch (\Throwable $th) {
            echo "
            <script> 
                alert ('ERRO AO DELETAR DADO') 
            </script>";
            
            echo "
            <script> 
                location.href ('../lista_agendamento_excluido.php') 
            </script>";
            
        }


    }

    public static function getById($id, $toAgnd=false) {
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = "SELECT * FROM agendamento WHERE id_agnd = $id";
        $query = mysqli_query($con, $sql);
        
        $result = mysqli_fetch_row($query);
        
        $agnd = new Agendamentos (
            $result[1],
            $result[2],
            $result[3],
            $result[4],
            $result[5],
        );

       return $toAgnd ? $agnd : $result;
    }

    public static function updateStatus($id, $new_status){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        
        $sql = 
        "UPDATE agendamento SET status_agnd='$new_status'
	    WHERE id_agnd=$id;";

        mysqli_query($con, $sql);
        mysqli_close($con);
    }
    
    public static function formataData(string $dataRecebida): string{
        $data = new DateTime($dataRecebida);
        
        return $data->format('d/m/Y H:i');
    }

    function getData_agendamento() {
        return $this->data_agendamento;
    }

    function getStatus_agendamento() {
        return $this->status_agendamento;
    }

    function setData_agendamento($data_agendamento) {
        $this->data_agendamento = $data_agendamento;
    }

    function setStatus_agendamento($status_agendamento) {
        $this->status_agendamento = $status_agendamento;
    }

    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
}
