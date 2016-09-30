<?php

include "conection.php";
//Pessoal 

if(isset($_POST['name'])){ $nome = $_POST['name']; }
if(isset($_POST['sobrenome'])){$sobrenome  = $_POST['sobrenome'];}
if(isset($_POST['email'])){$email = $_POST['email'];}
if(isset($_POST['CPF'])){$cpf = $_POST['CPF'];}
if(isset($_POST['pwd'])){$senha = $_POST['pwd'];}
if(isset($_POST['RG'])){$rg = $_POST['RG'];}
if(isset($_POST['sexo'])){$sexo = $_POST['sexo'];}
if(isset($_POST['telefone'])){$tel = $_POST['telefone'];}
if(isset($_POST['celular'])){$cel = $_POST['celular'];}


//Endereço
if(isset($_POST['bairro'])){$bairro  = $_POST['bairro'];}
if(isset($_POST['CEP'])){$cep = $_POST['CEP'];}
if(isset($_POST['rua'])){$rua = $_POST['rua'];}
if(isset($_POST['Numero'])){$numero = $_POST['Numero'];}
if(isset($_POST['cidade'])){$cidade = $_POST['cidade'];}
if(isset($_POST['estado'])){$estado = $_POST['estado'];}

 
 
if ((!$nome) || (!$sobrenome) || (!$email) || (!$cpf)){
 
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
 
    echo "Preencha os campos abaixo: <br /><br />"; 
 
    
 
}else{
         // Inserindo os dados no banco de dados
        $sql3 = mysqli_query($conn, 
 
                "INSERT INTO contato
                (email, telefone, telefone2)
 
                VALUES
                ('$email', '$tel', '$cel')")
 
                or die( mysql_error()
 
        );

        $key1 = mysqli_insert_id($conn);
        $sql2 = mysqli_query($conn, 
 
                "INSERT INTO endereco
                (rua, bairro, cidade, estado, cep, numero)
 
                VALUES
                ('$rua', '$bairro', '$cidade', '$estado', '$cep', '$numero')")
 
                or die( mysql_error()
 
        );
        $key2 = mysqli_insert_id($conn);
        $sql = mysqli_query($conn, 
"INSERT INTO usuario (NOME, SEXO, SENHA, SOBRENOME, ID_ENDERECO, ID_CONTATO, CPF, RG, LVL) "
                . "VALUES ('$nome', '$sexo', '$senha', '$sobrenome', '$key2', '$key1', '$cpf', '$rg', 0)");
        
        if(mysqli_affected_rows($conn) == 0){
            echo "Ocorreu um erro ao criar sua conta, entre em contato.";
            header('location:cadastro_cliente.php');
        }else{
 
            echo 'Cadastrado com Sucesso';
            header('location:index.php');
 
        }
 
}