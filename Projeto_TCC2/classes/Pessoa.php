<?php

abstract class Pessoa{
    protected $id;
    protected $nome;
    protected $login;
    protected $senha;
    protected $con;

    public abstract function insert();
    public abstract function delete();
    public abstract function update($id, $adm=0);
}