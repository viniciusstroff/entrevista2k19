<?php
include_once '../base_dir.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

if(!isset($_GET['op'])) 
    die('Opção Não Informada!');

try {
    switch ($_GET['op']) {
        case 'listar':
            $dao = new UsuarioDAO();
            return $dao->listar();

        case 'salvar':
         if(!empty($_POST['nm_usuario'] && $_POST['nr_cpf'] && $_POST['ds_login'] && $_POST['pw_senha']&& $_POST['ds_email'])){
            $usuario = new UsuarioVO();
            $usuario->setNmUsuario($_POST['nm_usuario']);
            $usuario->setCpfSemMascara($_POST['nr_cpf']);
            $usuario->setDsEmail($_POST['ds_email']);
            $usuario->setDsLogin($_POST['ds_login']);
            $usuario->setPwSenha($_POST['pw_senha']);
            $usuario->setIdPerfil($_POST['id_perfil']);
            $aoStatus = (!empty($_POST['ao_status']) && isset($_POST['ao_status']) ) ? 1 : 0;
            $usuario->setAoStatus($aoStatus);
            $usuario->setIdUsuarioinclusao(1);
            $usuario->setIdUsuarioalteracao(1);
            $usuario->setDtCadastro(date('Y-m-d H:i'));
            $usuario->setDtAlteracao(date('Y-m-d H:i'));

            $dao = new UsuarioDAO();
            $dao->cadastrar($usuario);
            header('location:../visao/GuiUsuarios.php?message=success');
            
            }else{
                 header('location:../visao/GuiCadastroUsuario.php');
            }
            break;

        case 'editar':
            $usuario = new UsuarioVO();

            $usuario->setIdUsuario($_POST['id_usuario']);
            $usuario->setNmUsuario($_POST['nm_usuario']);
            $usuario->setCpfSemMascara($_POST['nr_cpf']);
            $usuario->setDsLogin($_POST['ds_login']);
            $usuario->setPwSenha($_POST['pw_senha']);
            $usuario->setDsEmail($_POST['ds_email']);
            $usuario->setIdPerfil($_POST['id_perfil']);
            $usuario->setAoStatus($_POST['ao_status']);
            $usuario->setDtAlteracao(date('Y-m-d H:i'));

            $dao = new UsuarioDAO();
            $dao->editar($usuario);
            header('location:../visao/GuiUsuarios.php');
            break;

        case 'excluir':
            $idUsuario = $_GET['id_usuario'];
            $usuario = new UsuarioVO();
            $usuario->setIdUsuario($idUsuario);

            $dao = new UsuarioDAO();
            $dao->excluir($usuario);
            break;
    }
} catch (Exception $exception) {
    die('Erro');
}

