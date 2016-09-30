<?php
include 'conection.php';
$livro1 = $_POST['1Imagem'];
$livro2 = $_POST['2Imagem'];
$livro3 = $_POST['3Imagem'];
$livro4 = $_POST['4Imagem'];
mysqli_query($conn, "DELETE FROM `carrousel` WHERE 1");
mysqli_query($conn, "INSERT INTO carrousel(ID_LIVRO1, ID_LIVRO2, ID_LIVRO3, ID_LIVRO4) VALUES('$livro1','$livro2','$livro3',$livro4)") or die(mysqli_error($conn));
if(mysqli_affected_rows($conn) == 0){
    echo "Ocorreu um erro ao inserir";
    header('location:exec.php');
}else{

    echo 'Cadastrado com Sucesso';
    header('location:index.php');

}
?>