<?php 
include_once '../js/mascara.js';
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();
?>
    <?php 
     $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if(isset($_REQUEST['id_usuario'])){
        foreach($dao->find($_REQUEST['id_usuario']) as $usuario);

    }else{
        $usuario = new UsuarioVO();
    }
    ?>
    <div class="panel panel-default">
       
        <div class="panel-body">

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="<?= $usuario ? $usuario->getIdUsuario() : '' ?>">
                        <input type="text" name="nm_usuario" id="nm_usuario" value="<?= $usuario? $usuario->getNmUsuario() :'' ?>" class="form-control" required>
                    </div>
                </div>
                    
                <div class="col-md-5">
                    <div class="form-group">
                        <label>CPF</label>
                        <input type="text" name="nr_cpf" id="nr_cpf" value="<?= $usuario->getNrCpf() ?>" maxlength="14" class="form-control" required>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Login</label>
                        <input type="text" name="ds_login" id="ds_login" value="<?= $usuario->getDsLogin() ?>" class="form-control" required>
                    </div>
                </div> 

                <div class="col-md-5">
                    <div class="form-group">   
                        <label>Senha</label>
                        <input type="password" name="pw_senha" id="pw_senha" value="<?= $usuario->getPwSenha() ?>" class="form-control" required>
                    </div>
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="ds_email" id="ds_email" value="<?= $usuario->getDsEmail() ?>"class="form-control" required>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Perfil</label>
                        <select name="id_perfil" id="id_perfil" class="form-control">
                            <option value="1" <?=($usuario->getIdPerfil() == 1)?'selected':'';?> >Administrador</option>
                            <option value="2" <?=($usuario->getIdPerfil() == 2)?'selected':'';?> >Atendente</option>
                            <option value="3" <?=($usuario->getIdPerfil() == 3)?'selected':'';?>>Desenvolvedor</option>
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="row">
                 <div class="col-md-2">
                    <div class="form-group">
                        <label>Ativo ?</label>
                        <input type="checkbox" name="ao_status" id="ao_status" value="1" <?=($usuario->getAoStatus() == 1)?'checked':'';?> >
                    </div>

                </div>
            </div>
        
    
            <div class="pull-right">
                <a href="GuiUsuarios.php"><button type="button" class="btn btn-default">Voltar</button></a>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

        </div>
    </div>
