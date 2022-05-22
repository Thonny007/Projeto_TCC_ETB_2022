<?php

abstract class Pessoa{
    protected $id;
    protected $nome;
    protected $login;
    protected $senha;
    protected $con;

    public abstract function insert();
    public abstract function delete();
    public abstract function update($adm=0);
    public abstract function verifica($login, $senha);
    public abstract function loginAlredyExist();
    public abstract static function getByid($id, $toObj = false);
}