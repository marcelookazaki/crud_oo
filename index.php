<?php

    require_once 'conexao.php';
    require_once 'crudoo.php';
    require_once 'usuariosOO.php';   
?>
<!DOCTYPE>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Formulário de cadastro</title>
    <link href="estilo.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <?php
    //Criar obj usuarios e cadastrar
    $usuario = new usuariosOO();

    if(isset($_POST['btnCadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        //pegando o obj
        $usuario->setNome($nome);
        $usuario->setEmail($email);

        //Inserir no Banco 
        if($usuario->insert()){
            echo "Inserido com Sucesso";
        }
        else{
            echo "DEU RUIM NO INSERT";
        }
    }

    ?>

<div id="lista">

    <div class="funcionario">
        <div class="nome"></div>
        <div class="editar"></div>
        <div class="excluir"></a></div>
    </div>

</div>
<div id="formulario">
    <form name="formCad" action="" method="POST">
        <label>Nome: </label><br>
        <input type="text" name="nome" value="" required="required" ><br>
        <label>E-mail: </label><br>
        <input type="mail" name="email" required="required"><br>
        <br>
        <input type="submit" name="btnCadastrar" value="Cadastrar">
    </form>
</div>
<div>
   <?php 

    $crud = new usuariosOO();

    foreach($crud->findAll() as $stmt){ 
        echo $stmt['nome'].'<br>';
        echo $stmt['email'].'<br>';
        echo "<div><a href='#'>EDITAR</a></div>";
        echo "<div><a href='#'>EXLUIR</a></div><hr>";
    } ?>
    
 </div>
</body>
</html>