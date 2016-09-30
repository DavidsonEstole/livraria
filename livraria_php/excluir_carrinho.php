<?php

    include "conection.php";
    if(is_numeric($_GET["id"])){
        $exclui = mysqli_query($conn, "DELETE FROM `livraria`.`carrinho` WHERE `carrinho`.`ID` = ".$_GET["id"]);        
    }
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('Produto excluído com sucesso!');</script>";
        echo "<script>window.location = 'listar_livro.php';</script>";
    }