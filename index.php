<?php
include_once './base_dir.php';
include_once DIR_UTIL . 'Define.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Entrevista</title>
    </head>
    <body>
        <header>
            <nav>
                <ul class="menu">
                    <li><a class="fa fa-bars fa-lg"href="#" style="color:white"> Menu</a>
                        <ul>
                            <li><a href="index.php">Index</a></li>
                            <li><a href="./visao/GuiUsuarios.php">Lista de Usuarios</a></li>
                            <li><a href="./visao/GuiCadastroUsuario.php">Cadastro de Usuário</a></li>               
                        </ul>
                    </li>             
                </ul>
            </nav>
            <h1>Entrevista - Desenvolvimento Canoastec</h1>
                
        </header>

        <div class="conteudo">

            <div class="conteudo-instrucao">
                <h2>Instruções</h2>
                <p><strong>Configurações antes de codificar</strong></p>
                <p><input type="checkbox" id="box-1" class="box">1 - No arquivo 'DeefineCredenciais.php' definir as variaveis de acordo com as configurações do seu banco de dados local.</p>
                <p><input type="checkbox" id="box-2" class="box">2 - Criar um banco de dados chamado entrevista.</p>
                <p><input type="checkbox" id="box-3" class="box">3 - Importar os dados do arquivo 'entrevista.sql'.</p>
                <p><strong>Modificar Tela de Listagem de Usuários</strong></p>
                <p><input type="checkbox" id="box-4" class="box">1 - Exibir a data de cadastro no formato DD/MM/AAAA</p>
                <p><input type="checkbox" id="box-5" class="box">2 - Ter uma coluna de ações, com botões para editar e deletar</p>
                <p><input type="checkbox" id="box-6" class="box">3 - Em caso de não trazer registro, ter uma mensagem "nenhum registro encontrado" e não exibir a mensagem</p>
                <p><input type="checkbox" id="box-7" class="box">4 - Criar uma area de filtro, que possa buscar por nome e cpf</p>
                <p><input type="checkbox" id="box-8" class="box">5 - Exibir CPF no padrão ###.###.###-##</p>
                <br>
                <p><strong>Modificar Tela de Cadastro de Usuários</strong></p>
                <p><input type="checkbox" id="box-9" class="box">1 - Criar validação para não permitir salvar sem preencher todos os campos</p>
                <p><input type="checkbox" id="box-10" class="box">2 - Após salvar redirecionar para tela de listagem, e mostrar mensagem de sucesso.</p>
                <br>
                <p><strong>Novas Funcionalidades</strong></p>
                <p><input type="checkbox" id="box-11" class="box">1 - Possibilitar deletar registro</p>
                <p><input type="checkbox" id="box-12" class="box">2 - Possibilitar edição dos dados.</p>
                <p><input type="checkbox" id="box-13" class="box">3 - Criar menu com acesso as telas de cadastro e listagem.</p>
                <br>
                <p><strong>Melhorias não obrigatórias - Pontos Extras</strong></p>
                <p><input type="checkbox" id="box-14" class="box">1 - Exibir na listagem o perfil do usuário</p>
                <p><input type="checkbox" id="box-15" class="box">2 - Incluir e usar a biblioteca Bootstrap ou Materialize</p>
                <p><input type="checkbox" id="box-16" class="box">3 - Incluir e usar a biblioteca Jquery</p>
                <p><input type="checkbox" id="box-17" class="box">4 - Criar CRUD de perfil e fazer o relacionamento com usuário</p>
                <p><input type="checkbox" id="box-18" class="box">5 - Nesta tela de instruções, criar checkbox para marcar que a tarefa foi concluida e salvar este estado sem usar a session do PHP e nem o banco de dados.</p>
            </div>

        </div>
    </body>
</html>

<style>
       
    .conteudo {    
        margin: 2em auto;
        width: 60%;
    }

    .conteudo-instrucao{
        border: 1px solid #ddd;
        border-top-left-radius: 1em;
        border-top-right-radius: 1em;
    }

    .conteudo-instrucao h2 {   
        margin-top: 0;
        border-top: 1em solid  #f8f8f8;
        border-bottom: 1em solid  #f8f8f8;
        border-top-left-radius: 0.7em;
        border-top-right-radius: 0.7em;
        background-color: #f8f8f8;
    }
    
    .conteudo-instrucao p {    
        padding: 0 1em;
    }

</style>

<script type="text/javascript">
   function onClickBox() {
    var arr = $('.box').map(function() {
    return this.checked;
  }).get();
  localStorage.setItem("checked", JSON.stringify(arr));
}

$(document).ready(function() {
    var arr = JSON.parse(localStorage.getItem('checked')) || [];
  arr.forEach(function(checked, i) {
    $('.box').eq(i).prop('checked', checked);
  });

  $(".box").click(onClickBox);
});
</script>