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
        
        if ($excluidos) {
            $sql_consulta = "SELECT id_agnd, data_agnd, status_agnd, descricao_tatto
            FROM agendamento";
        } else {
            $sql_consulta = "SELECT id_agnd, data_agnd, status_agnd, descricao_tatto
            FROM agendamento
            WHERE status_agnd != 'desmarcado' ";
        }
    
        return $result = mysqli_query ($con, $sql_consulta);
    }

    public static function getImgById($id){
        $con = mysqli_connect("localhost", "root", "", "agendamentos");
        $sql = "SELECT imagem_atendimento FROM agendamento WHERE id_agnd = $id";
        
        return mysqli_query($con, $sql);
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
