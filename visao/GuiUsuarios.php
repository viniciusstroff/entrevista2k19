<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();
?>


<div class="conteudo">
<?php

    $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(strpos($fullUrl, "message=success") == true){
        echo "
        <div class='alert alert-success text-center message' style=''>
             Usuário Cadastrado com Sucesso
        </div>";
    }
 ?>
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
         <div class="pull-right">
                <a href="GuiCadastroUsuario.php"><button type="button" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Cadastrar</button></a>
        </div>
        <form class="form-inline" method="POST" action="#">
            <div>
                <input class="form-control mr-sm-2" type="text" name="filtro" placeholder="CPF/Nome">
                <button class="btn btn-default" type="submit"><i class="fa fa-eraser" aria-hidden="true"></i>Limpar</button>
                <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i> Pesquisar</button>
            </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th width="30%">Nome</th>
                    <th width="10%">CPF</th>
                    <th width="30%">Email</th>
                    <th width="10%">Status</th>
                    <th width="10%">Data de Cadastro</th>
                    <th width="10" colspan="2" class="text-center">Ações</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    if(isset($_POST['filtro'])){
                        $filtro = $_POST['filtro'];
                    }else{
                        $filtro = '';
                    }
                ?>
                <?php foreach ($dao->listar($filtro) as $usuario) { ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=$usuario->getNrCpf()?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "<p style='color:green'>Ativo</p>" : "<p style='color:red'>Inativo</p>" ?></td>
                    <td><?=$usuario->getDtCadastro()?></td>
                    <td class="text-center">
                    <!--<form method="POST" action="../controle/ControleUsuario.php?op=editar">-->
                        <a  style="margin-right:10px;" class="glyphicon glyphicon-pencil" name="id_edit" id="id_edit" href="../visao/GuiEditarUsuario.php?op=editar&id_usuario=<?=$usuario->getIdUsuario();?> " value="<?=$usuario->getIdUsuario()?>"></a>
                        <a class="glyphicon glyphicon-trash" href="../controle/ControleUsuario.php?op=excluir&id_usuario=<?=$usuario->getIdUsuario();?> "></a>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }
</style>    