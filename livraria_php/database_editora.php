<?php

include "conection.php";
//Pessoal 

if(isset($_POST['name'])){ $nome = $_POST['name']; }
if(isset($_POST['autor'])){$sobrenome  = $_POST['autor'];}
if(isset($_POST['telefone'])){$telefone = $_POST['telefone'];}
if(isset($_POST['celular'])){$celular = $_POST['celular'];}
if(isset($_POST['email'])){$email = $_POST['email'];}  


//Endereço
if(isset($_POST['bairro'])){$bairro  = $_POST['bairro'];}
if(isset($_POST['CEP'])){$cep = $_POST['CEP'];}
if(isset($_POST['rua'])){$rua = $_POST['rua'];}
if(isset($_POST['Numero'])){$numero = $_POST['Numero'];}
if(isset($_POST['cidade'])){$cidade = $_POST['cidade'];}
if(isset($_POST['estado'])){$estado = $_POST['estado'];}

if ((!$nome) || (!$email) || (!$telefone) || (!$celular)){
 
    echo "ERRO: <br /><br />";
 
    if (!$nome){
 
        echo "Nome é requerido.<br />";
 
    }
 
    if (!$sobrenome){
 
        echo "Sobrenome é requerido.<br /> <br />";
 
    }
 
    if (!$email){
 
        echo "Email é um campo requerido.<br /><br />";
 
    }
 
    if (!$cpf){
 
        echo "CPF é requerido.<br /><br />";
 
    }
    
    if (!$senha){
 
        echo "Senha é requerido.<br /><br />";
 
    }
 
    echo "Preencha os campos abaixo: <br /><br />"; 
 
    include "cadastro_editora.php";
 
}else{
        $sql3 = mysqli_query($conn, 
 
                "INSERT INTO contato
                (email, telefone, telefone2)
 
                VALUES
                ('$email', '$telefone', '$celular')")
 
                or die( "Erro no cadastro" . mysql_error()
 
        );
        $key1 = mysqli_insert_id($conn);
        $sql2 = mysqli_query($conn, 
 
                "INSERT INTO endereco
                (rua, bairro, cidade, estado, cep)
 
                VALUES
                ('$rua', '$bairro', '$cidade', '$estado', '$cep')")
 
                or die( "Erro no cadastro" . mysql_error()
        );
        $key2 = mysqli_insert_id($conn);
        $sql = mysqli_query($conn, 
                "INSERT INTO `editora` (`NOME`, `ID_ENDERECO`, `ID_CONTATO`) "
                . "VALUES ('$nome', '$key2', '$key1')")
                or die("Erro no cadastro" . mysql_error());
        if(mysqli_affected_rows($conn) == 0){
            echo "Ocorreu um erro, entre em contato.";
        }else{
            echo '<alert>Cadastrado com Sucesso</alert>';
            header('location:index.php');
        }
}