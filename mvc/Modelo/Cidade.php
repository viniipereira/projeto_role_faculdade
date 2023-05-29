<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;

class Cidade extends Modelo
{
    const INSERIR = 'INSERT INTO cidade(nome, uf) VALUES (?, ?)';

    const BUSCAR_TODAS = 'SELECT * FROM cidade';
    private $nome;
    private $uf;
    private $id;

    public function __construct($nome, $uf,)
    {
        $this->nome = $nome;
        $this->uf = $uf;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getUf()
    {
        return $this->uf;
    }

    public function salvar()
    {
        $this->inserir();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->uf, PDO::PARAM_STR);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }



    public static function buscarTodas()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODAS);
        $cidades = [];
        foreach ($registros as $registro) {


           $cidade = new Cidade(
            $registro['nome'],
            $registro['uf'],
        );

        $cidade->setId($registro['id']);

            $cidades[] = $cidade;
        }
        return $cidades;
    }


    protected function verificarErros()
    {
        if (strlen($this->nome) < 3 || strlen($this->nome) > 100) {
            $this->setErroMensagem('nome', 'Nome da cidade deve ter entre 3 e 100 caracteres.');
        }
        if (strlen($this->uf) !== 2) {
            $this->setErroMensagem('uf', 'UF deve ter 2 caracteres.');
        }
    }
}
