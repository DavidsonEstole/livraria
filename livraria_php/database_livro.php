<?php

include "conection.php";
if (!isset($_FILES['image']['tmp_name'])) {
	echo "Nenhuma Imagem adicionada";
        exit();
	}
else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
        move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);
        $location = "uploads/" . $_FILES["image"]["name"];
}

if(isset($_POST['name'])){ $nome = $_POST['name']; }
if(isset($_POST['autor'])){$autor  = $_POST['autor'];}
if(isset($_POST['categoria'])){$categoria = $_POST['categoria'];}
if(isset($_POST['editora'])){$editora = $_POST['editora'];}
if(isset($_POST['preco'])){$preco = $_POST['preco'];}  
if(isset($_POST['estoque'])){$quantidade = $_POST['estoque'];}  
if(isset($_POST['descricao'])){$descricao = $_POST['descricao'];}









if ((!$nome) || (!$autor) || (!$categoria) || (!$editora) || (!$preco)){
        echo "ERRO: <br /><br />";
 
    if (!$nome){
 
        echo "Nome é requerido.<br />";
 
    }
 
    if (!$autor){
 
        echo "Sobrenome é requerido.<br /> <br />";
 
    }
 
    if (!$categoria){
 
        echo "Email é um campo requerido.<br /><br />";
 
    }
 
    if (!$editora){
 
        echo "CPF é requerido.<br /><br />";
 
    }
    
    if (!$preco){
 
        echo "Senha é requerido.<br /><br />";
 
    }
 
    echo "Preencha os campos abaixo: <br /><br />"; 
    include "cadastro_editora.php";
}

$sql=mysqli_query($conn, "SELECT id FROM autor WHERE nome=$autor");
if (!$sql || mysqli_num_rows($sql) == 0) {
    $sql1 = mysqli_query($conn, 

        "INSERT INTO autor
        (nome)

        VALUES
        ('$autor')")

        or die( "Erro no cadastro" . mysql_error()

);
    $key = mysqli_insert_id($conn);
}else{
    $key = $sql;
}


$sql = mysqli_query($conn, 

        "INSERT INTO livro
        (nome, categoria, preco, id_editora, quantidade, Imagem, descricao)

        VALUES
        ('$nome', '$categoria', '$preco', '$editora', '$quantidade', '$location', '$descricao')")

        or die( "Erro no cadastro" . mysql_error()

);
$key2 = mysqli_insert_id($conn);
$sql2 = mysqli_query($conn, 

        "INSERT INTO livro_autor
        (id_autor, id_livro)

        VALUES
        ('$key', '$key2')")

        or die( "Erro no cadastro" . mysql_error()

);
if(mysqli_affected_rows($conn) == 0){
            echo "Ocorreu um erro ao criar sua conta, entre em contato.";
        }else{
            echo 'Cadastrado com Sucesso';
            echo "<script>window.location = 'index.php';</script>";
}
