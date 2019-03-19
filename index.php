<?php

    require_once 'conexao.php';
    // require_once 'crudoo.php';
    require_once 'usuariosOO.php';   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulário de cadastro</title>
    <!-- <link href="estilo.css" rel="stylesheet" type="text/css" > -->
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
            echo "Inserido com Sucesso" . "<br>";
            header("Location:index.php");
        }
        else{
            echo "DEU RUIM NO INSERT";
        }
    }
    
    foreach ($usuario->findAll() as $key => $value) {

        // print_r ($value);
        echo $value['id'].'<br>';
        echo $value['nome'].'<br>';
        echo $value['email'].'<br>';

        echo "<div><a href='#' >EDITAR</a></div>";
        echo "<div><input type='submit' name='btnExcluir' value='Excluir'></div><hr>";
    }

    if(isset($_POST['excluir']))
    {
        if($usuario->delete())
        {
            echo "morrreu aqui"; 
        }
    }

    ?>

    <div id="formulario">
        <form name="formCad" action="" method="POST">
            <label>Nome: </label><br>
            <input type="text" name="nome" value=""><br>
            <label>E-mail: </label><br>
            <input type="mail" name="email"><br>
            <br>
            <input type="submit" name="btnCadastrar" value="Cadastrar">
        </form>
    </div>
</body>
</html>