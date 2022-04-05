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

        return mysqli_query($this->con, $sql);
        
    }

    public function getById(int $id): string{
        $sql = "SELECT * FROM agendamento WHERE id_clt = $id";
        $query = mysqli_query($this->con, $sql);

        return mysqli_fetch_row($query);
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
/*-------------------------------------------------------------------*/    
/*-------------------------------------------------------------------*/    
    public function getImagem(){
        return $this->imagem;
    }

    public function setImagem($imagem){
        $this->imagem = $imagem;
    }
}
