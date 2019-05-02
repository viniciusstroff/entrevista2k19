<?php
include_once './Header.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';



?>

<form class="form-group" id="cadUsuario" method="POST" action="../controle/ControleUsuario.php?op=editar">


	<div class="container">
	    <h1 class="text-center">Edição de Usuário</h1>
	   
	    <?php include_once './GuiFormUsuario.php';?>
	</div>
</form>


	<?php include_once 'Footer.php';?>


<style>
    .formulario-campos{
        margin: 1em 30%;
    }

    .botoes{
        float: right;
        margin: 3em 47%;
    }
</style>