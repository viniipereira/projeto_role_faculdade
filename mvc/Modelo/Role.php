<?php
namespace Modelo;

use \PDO;
use \Framework\DW3BancoDeDados;
use \Framework\DW3ImagemUpload;

class Role extends Modelo
{
    const INSERIR = 'INSERT INTO role(nome, descricao,foto,nota,horario,id_cidade,id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)';
    const BUSCAR_TODOS = 'SELECT role.id , role.nome , role.descricao, role.foto, role.nota, role.horario, cidade.nome as cidade , role.id_usuario as usuario FROM role inner join cidade on role.id_cidade = cidade.id order by cidade.nome ,role.nota desc';

    private $nome;
    private $descricao;
    private $foto;
    private $nota;
    private $horario;
    private $cidade;
    private $id;
    private $usuario;

    public function __construct($nome, $descricao,$foto,$nota,$horario,$cidade,$usuario)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->foto = $foto;
        $this->nota = $nota;
        $this->horario = $horario;
        $this->cidade = $cidade;
        $this->usuario = $usuario;

    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNota()
    {
        return $this->nota;
    }
    public function getHorario()
    {
        return $this->horario;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function salvar()
    {
        $this->inserir();
        $this->salvarImagem();
    }

    public function inserir()
    {
        DW3BancoDeDados::getPdo()->beginTransaction();
        $comando = DW3BancoDeDados::prepare(self::INSERIR);
        $comando->bindValue(1, $this->nome, PDO::PARAM_STR);
        $comando->bindValue(2, $this->descricao, PDO::PARAM_STR);
        $comando->bindValue(3, $this->foto, PDO::PARAM_STR);
        $comando->bindValue(4, $this->nota, PDO::PARAM_STR);
        $comando->bindValue(5, $this->horario, PDO::PARAM_STR);
        $comando->bindValue(6, $this->cidade, PDO::PARAM_INT);
        $comando->bindValue(7, $this->usuario, PDO::PARAM_INT);
        $comando->execute();
        $this->id = DW3BancoDeDados::getPdo()->lastInsertId();
        DW3BancoDeDados::getPdo()->commit();
    }

    public function getImagem()
    {
        $imagemNome = "{$this->id}.png";
        if (!DW3ImagemUpload::existe($imagemNome)) {
            $imagemNome = 'padrao.png';
        }
        return $imagemNome;
    }


    private function salvarImagem()
    {
        if (DW3ImagemUpload::isValida($this->foto)) {
            $nomeCompleto = PASTA_PUBLICO . "img/{$this->id}.png";
            DW3ImagemUpload::salvar($this->foto, $nomeCompleto);
        }
    }


    public static function buscarTodos()
    {
        $registros = DW3BancoDeDados::query(self::BUSCAR_TODOS);
        $roles = [];
        foreach ($registros as $registro) {


           $role = new Role(
            $registro['nome'],
            $registro['descricao'],
            $registro['foto'],
            $registro['nota'],
            $registro['horario'],
            $registro['cidade'],
            $registro['usuario'],
        );

        $role->setId($registro['id']);

            $roles[] = $role;
        }
        return $roles;
    }

    public static function buscarPorCidade($id_cidade)
    {
         $BUSCAR_POR_CIDADE = 'SELECT role.id, role.nome, role.descricao, role.foto, role.nota, role.horario, cidade.nome AS cidade , role.id_usuario as usuarios FROM role INNER JOIN cidade ON role.id_cidade = cidade.id WHERE id_cidade = ' . $id_cidade;

        $registros = DW3BancoDeDados::query($BUSCAR_POR_CIDADE);
        $roles = [];
        foreach ($registros as $registro) {

           $role = new Role(
            $registro['nome'],
            $registro['descricao'],
            $registro['foto'],
            $registro['nota'],
            $registro['horario'],
            $registro['cidade'],
            $registro['usuarios'],
        );

        $role->setId($registro['id']);

            $roles[] = $role;
        }
        return $roles;
    }



    protected function verificarErros()
    {
        if (strlen($this->nome) < 3 || strlen($this->nome) > 100) {
            $this->setErroMensagem('nome', 'Nome da cidade deve ter entre 3 e 100 caracteres.');
        }
        if (strlen($this->descricao) !== 2) {
            $this->setErroMensagem('uf', 'UF deve ter 2 caracteres.');
        }
    }

    public static function deletarRole($id_role) {
        $DELETAR = 'DELETE FROM role where role.id = ' . $id_role;

try {
    DW3BancoDeDados::query($DELETAR);
    return true;
} catch (\Throwable $th) {
   return false;
}
         
    }
}
