<?php

include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';

class UsuarioDAO {
    
    private $conexao = null;
    
    function __construct() {
    }
    
    function listar($filtros) {
        try{
            $query = ("SELECT * FROM usuario u WHERE nm_usuario LIKE '%$filtros%' OR nr_cpf LIKE '%$filtros%' ORDER BY u.nm_usuario ASC");

            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
            
            $usuarios = array();

            foreach ($array as $obj) {
                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;
            }
            $this->conexao = null;

            return $usuarios;
        }catch(Exception $e){
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

    function find($id) {
        try{
            $query = ("SELECT * FROM usuario WHERE id_usuario = '$id'");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
            
            $usuarios = array();

            foreach ($array as $obj) {
                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;
            }
            $this->conexao = null;
            return $usuarios;
        }catch(Exception $e){
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }

 

    function cadastrar(UsuarioVO $usuario){
        try{

            $sql = "
                INSERT INTO usuario(
                    nm_usuario,
                    ds_email,
                    nr_cpf,
                    ds_login,
                    pw_senha,
                    id_perfil,
                    ao_status,
                    id_usuarioinclusao,
                    id_usuarioalteracao,
                    dt_cadastro,
                    dt_alteracao
                )VALUES(
                    '{$usuario->getNmUsuario()}',
                    '{$usuario->getDsEmail()}',
                    '{$usuario->getNrCpf()}',
                    '{$usuario->getDsLogin()}',
                    '{$usuario->getPwSenha()}',
                    '{$usuario->getIdPerfil()}',
                    '{$usuario->getAoStatus()}',
                    '{$usuario->getIdUsuarioInclusao()}',
                    '{$usuario->getIdUsuarioAlteracao()}',
                    now(),
                    now()
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;

        }catch(Exception $e){
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }

     function editar(UsuarioVO $usuario){
        try {
            $sql = "
            UPDATE usuario 
                    SET nm_usuario = '{$usuario->getNmUsuario()}',
                    nr_cpf = '{$usuario->getNrCpf()}',
                    ds_email = '{$usuario->getDsEmail()}',
                    ds_login = '{$usuario->getDsLogin()}',
                    pw_senha = '{$usuario->getPwSenha()}',
                    id_perfil = '{$usuario->getIdPerfil()}',
                    ao_status = '{$usuario->getAoStatus()}',
                    id_usuarioinclusao ='{$usuario->getIdUsuarioInclusao()}',
                    id_usuarioalteracao = '{$usuario->getIdUsuarioAlteracao()}',
                    dt_cadastro = now(),
                    dt_alteracao = now()
                    WHERE id_usuario = '{$usuario->getIdUsuario()}'";
                    
            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao fazer alteração no Usuario";
        }
    }

     function excluir(UsuarioVO $usuario){
        try{
            $sql = " DELETE FROM usuario "
                . " where id_usuario = " . $usuario->getIdUsuario();
        
            
            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            header("Location: ../visao/GuiUsuarios.php");
            return true;


        }catch(Exception $e){
            echo  $usuario->getIdUsuario();
            echo "Erro ao excluir o Usuario";
            
            return false;
        }
    }



}
