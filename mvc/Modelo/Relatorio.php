<?php
namespace Modelo;

use \Framework\DW3BancoDeDados;

class Relatorio extends Modelo
{

    // Total de cidades cadastradas
    const TOTAL_DE_CIDADES = 'SELECT COUNT(*) AS total_cidades  FROM cidade';
    
    //Total de roles cadastrados
    const TOTAL_DE_ROLES = 'SELECT COUNT(*) AS total_roles FROM role';
    
    // Total de roles cadastrados de dia
    const ROLES_DE_DIA  = "SELECT COUNT(*) AS roles_de_dia FROM role  WHERE horario = 'dia';";
    
    //Total de roles cadastrados de noite
    const ROLES_DE_NOITE = "SELECT COUNT(*) AS roles_de_noite FROM role WHERE horario = 'noite';";
    
    //Quantidade de roles divididos por nota
    const ROLES_POR_NOTA = 'SELECT nota, COUNT(*) AS quantidade FROM role GROUP BY nota;';
    
    public static function relatorio()
    {
        $relatorio = [];
    
        $totalDeRoles = DW3BancoDeDados::query(self::TOTAL_DE_ROLES);
        foreach ($totalDeRoles as $role) {
            $relatorio['total_roles'][] = $role['total_roles'];
        }
    
        $totalDeCidades = DW3BancoDeDados::query(self::TOTAL_DE_CIDADES);
        foreach ($totalDeCidades as $cidade) {
            $relatorio['total_cidades'][] = $cidade['total_cidades'];
        }
    
        $rolesDeDia = DW3BancoDeDados::query(self::ROLES_DE_DIA);
        foreach ($rolesDeDia as $rolesDia) {
            $relatorio['roles_de_dia'][] = $rolesDia['roles_de_dia'];
        }
    
        $rolesDeNoite = DW3BancoDeDados::query(self::ROLES_DE_NOITE);
        foreach ($rolesDeNoite as $roleNoite) {
            $relatorio['roles_de_noite'][] = $roleNoite['roles_de_noite'];
        }
    
        $rolesPorNota = DW3BancoDeDados::query(self::ROLES_POR_NOTA);
        foreach ($rolesPorNota as $roleNota) {
            $quantidade = $roleNota['quantidade'];
            $relatorio['roles_por_nota'][$roleNota['nota']] = !empty($quantidade) ? $quantidade : 0;
        }
        
    
        return $relatorio;
    }
    
}
