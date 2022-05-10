<?php

abstract class Pessoa{
    protected $nome;
    protected $login;
    protected $senha;
    protected $con;

    public abstract function insert();
    public abstract function delete($id);
    public abstract function update($id, $adm=0);
}